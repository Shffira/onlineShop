<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Halaman checkout buyer
     */
    public function checkout(Product $product)
{
    abort_unless($product->is_active, 404);

    if ($product->stock < 1) {
        return redirect()
            ->route('products.show', $product->slug)
            ->with('error', 'Produk sedang habis.');
    }

    $from = request('from', 'products');

    if (!in_array($from, ['home', 'products'])) {
        $from = 'products';
    }

    return view('orders.checkout', compact('product', 'from'));
}

    /**
     * Simpan pesanan buyer
     */
    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
            'recipient_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'province' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:100'],
            'district' => ['required', 'string', 'max:100'],
            'postal_code' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string'],
            'payment_method' => ['required', 'in:cod,transfer'],
            'payment_proof' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
                'required_if:payment_method,transfer',
            ],
            'notes' => ['nullable', 'string'],
        ]);

        if ($validated['quantity'] > $product->stock) {
            return back()
                ->withInput()
                ->with('error', 'Jumlah pembelian melebihi stok produk.');
        }

        DB::transaction(function () use ($validated, $product, $request) {

            $total = $product->price * $validated['quantity'];

            $paymentProof = null;

            if (
                $validated['payment_method'] === 'transfer'
                && $request->hasFile('payment_proof')
            ) {
                $paymentProof = $request
                    ->file('payment_proof')
                    ->store('payment-proofs', 'public');
            }

            $order = Order::create([
                'user_id' => auth()->id(),
                'invoice' => 'INV-' . strtoupper(Str::random(10)),
                'total' => $total,

                'payment_method' => $validated['payment_method'],

                'payment_status' => $validated['payment_method'] === 'cod'
                    ? 'menunggu pembayaran'
                    : 'menunggu verifikasi',

                'status' => 'menunggu pembayaran',

                'recipient_name' => $validated['recipient_name'],
                'phone' => $validated['phone'],
                'province' => $validated['province'],
                'city' => $validated['city'],
                'district' => $validated['district'],
                'postal_code' => $validated['postal_code'],
                'address' => $validated['address'],

                'payment_proof' => $paymentProof,
                'notes' => $validated['notes'] ?? null,
            ]);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'price' => $product->price,
                'quantity' => $validated['quantity'],
                'subtotal' => $total,
            ]);

            $product->decrement(
                'stock',
                $validated['quantity']
            );
        });

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pesanan berhasil dibuat.');
    }

    /**
     * Pesanan Saya — hanya milik buyer yang sedang login
     */
    public function index()
    {
        $orders = Order::with('orderItems')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    /**
     * Detail pesanan buyer
     */
    public function show(Order $order)
    {
        abort_unless(
            $order->user_id === auth()->id(),
            403
        );

        $order->load('orderItems', 'user');

        return view('orders.show', compact('order'));
    }
}
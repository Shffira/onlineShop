@csrf

<div class="row g-3">
  <div class="col-md-8">
    <div class="mb-3">
      <label class="form-label">Nama Produk</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $product->name ?? '') }}">
      @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="description" rows="4"
        class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description ?? '') }}</textarea>
      @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Harga (Rp)</label>
        <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror"
          value="{{ old('price', $product->price ?? '') }}">
        @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
          value="{{ old('stock', $product->stock ?? 0) }}">
        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="mb-3">
      <label class="form-label">Kategori</label>
      <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
        <option value="">-- Pilih Kategori --</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
      @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Gambar Produk</label>
      <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
      @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror

      @isset($product)
        <img src="{{ $product->image_url }}" class="img-thumbnail mt-2" style="max-width:150px;">
      @endisset
    </div>

    <div class="form-check form-switch mb-3">
      <input type="hidden" name="is_active" value="0">
      <input type="checkbox" name="is_active" value="1" class="form-check-input" id="isActive"
        @checked(old('is_active', $product->is_active ?? true))>
      <label class="form-check-label" for="isActive">Aktif / tampil di toko</label>
    </div>
  </div>
</div>

<div class="mt-4">
  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Batal</a>
</div>

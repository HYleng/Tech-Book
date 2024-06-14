{{-- resources/views/books/edit.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Book</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="ISBN">ISBN</label>
                                <input type="text" class="form-control" id="ISBN" name="ISBN" value="{{ $book->ISBN }}">
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id === $book->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="author_name">Author Name</label>
                                <input type="text" class="form-control" id="author_name" name="author_name" value="{{ $book->author_name }}">
                            </div>

                            <div class="form-group">
                                <label for="published_date">Published Date</label>
                                <input type="date" class="form-control" id="published_date" name="published_date" value="{{ $book->published_date }}">
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ $book->price }}">
                            </div>

                            <div class="form-group">
                                <label for="cover_image">Cover Image</label>
                                <input type="file" class="form-control-file" id="cover_image" name="cover_image">
                                <small class="form-text text-muted">Upload new cover image if you want to replace the existing one.</small>
                            </div>

                            <div class="form-group">
                                <label for="book_file">Book File (PDF)</label>
                                <input type="file" class="form-control-file" id="book_file" name="book_file">
                                <small class="form-text text-muted">Upload new book file if you want to replace the existing one.</small>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

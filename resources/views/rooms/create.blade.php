@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title fw-bold mt-2">TẠO PHÒNG THI</h1>
            </div>
            <div class="card-body">
                <!-- Form for creating a room -->
                <form action="{{ url('rooms') }}" method="POST">
                    @csrf

                    <!-- Select owner of the room -->
                    <div class="mb-3">
                        <label for="ownerId" class="form-label">Chủ Phòng</label>
                        <select id="ownerId" class="form-select @error('ownerId') is-invalid @enderror" name="ownerId"
                            required>
                            <option value="" selected disabled>Chọn chủ phòng</option>
                            @foreach ($users as $owner)
                                <option value="{{ $owner->id }}">{{ $owner->username }}</option>
                            @endforeach
                        </select>
                        @error('ownerId')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Select quiz collection for the room -->
                    <div class="mb-3">
                        <label for="quizCollectionId" class="form-label">Bộ Đề Thi</label>
                        <select id="quizCollectionId" class="form-select @error('quizCollectionId') is-invalid @enderror"
                            name="quizCollectionId" required>
                            <option value="" selected disabled>Chọn bộ đề thi</option>
                            @foreach ($quizCollections as $quizCollection)
                                <option value="{{ $quizCollection->id }}">{{ $quizCollection->name }}</option>
                            @endforeach
                        </select>
                        @error('quizCollectionId')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary">XÁC NHẬN TẠO PHÒNG THI</button>
                    <a href="{{ url('rooms') }}" class="btn btn-outline-secondary">VỀ DANH SÁCH</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title fw-bold mt-2">CHỈNH SỬA PHÒNG THI</h1>
            </div>
            <div class="card-body">
                <!-- Form for editing a room -->
                <form action="{{ url('rooms/' . $room->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Select owner of the room -->
                    <div class="mb-3">
                        <label for="ownerId" class="form-label">Chủ Phòng</label>
                        <select id="ownerId" class="form-select @error('ownerId') is-invalid @enderror" name="ownerId"
                            required>
                            <option value="" disabled>Chọn chủ phòng</option>
                            @foreach ($users as $owner)
                                <option value="{{ $owner->id }}" {{ $owner->id == $room->owner->id ? 'selected' : '' }}>
                                    {{ $owner->username }}
                                </option>
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
                            <option value="" disabled>Chọn bộ đề thi</option>
                            @foreach ($quizCollections as $quizCollection)
                                <option value="{{ $quizCollection->id }}"
                                    {{ $quizCollection->id == $room->quizCollection->id ? 'selected' : '' }}>
                                    {{ $quizCollection->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('quizCollectionId')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary">CẬP NHẬT PHÒNG THI</button>
                    <a href="{{ URL::to('rooms/' . $room->id) }}" class="btn btn-outline-secondary">VỀ PHÒNG</a>
                </form>
            </div>
        </div>
    </div>
@endsection

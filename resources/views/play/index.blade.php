@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- Info phòng --}}
            <div class="col-md-8">
                <h1 class="fw-bold">ĐỀ THI: {{ $room->quizCollection->name }}</h1>
                <h5>Người tổ chức: GV. {{ $room->owner->last_name }} {{ $room->owner->first_name }}</h5>
                <p>Mã phòng thi: {{ $room->code }}</p>
            </div>

            {{-- ĐỒNG HỒ TÍNH GIỜ --}}
            <div class="col-md-4 text-end">
                <div class="d-flex justify-content-end">
                    <h1 class="me-2">Thời gian còn lại:</h1>
                    <h1 id="timer" class="fw-bold">00:05</h1>
                </div>
                <button id="startTimer" class="btn btn-primary" onclick="startTimer()">BẮT ĐẦU</button>
                @if (Auth::user()->role == 'ADMIN' || Auth::user()->id == $room->owner_id)
                    <button id="pauseTimer" class="btn btn-danger" onclick="pauseTimer()" disabled>TẠM NGỪNG</button>
                @endif
            </div>

            <hr class="mt-1" />

            <form action="{{ url('rooms/' . $room->id . '/play/submit') }}" method="POST">
                @csrf
                {{-- CÁC CÂU HỎI --}}
                <div class="mt-2" id="questionSection" style="display: none;">
                    <div class="row row-cols-1">
                        @foreach ($room->quizCollection->quizzes as $index => $quiz)
                            <div class="col mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold mb-2">{{ $quiz->content }}</h5>
                                        <p class="card-text">{{ $quiz->explaination }}</p>
                                        <div class="list-group">
                                            @foreach ($quiz->answers as $answer)
                                                <label class="list-group-item">
                                                    <input type="radio" name="answers[{{ $quiz->id }}]"
                                                        value="{{ $answer->id }}">
                                                    {{ $answer->content }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <hr class="mt-2" />

                    {{-- CÁC NÚT --}}
                    <div class="d-flex justify-content-end">
                        <div>
                            <button class="btn btn-primary px-5" disabled>
                                LƯU BÀI
                            </button>
                            <button class="btn btn-success px-5" data-bs-toggle="modal" data-bs-target="#submitTestModal">
                                NỘP BÀI
                            </button>
                        </div>
                    </div>
                </div>

                {{-- MODAL NỘP BÀI --}}
                <div class="modal fade" id="submitTestModal" tabindex="-1" aria-labelledby="submitTestModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="submitTestModalLabel">NỘP BÀI</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Bạn có chắn chắn muốn NỘP BÀI không?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">HUỶ</button>

                                <button type="submit" class="btn btn-success">XÁC NHẬN NỘP BÀI</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            <style>
                .card {
                    transition: box-shadow 0.3s ease;
                    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0);
                }

                .card:hover {
                    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
                }

                .list-group-item {
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }

                .list-group-item:hover,
                .list-group-item:focus {
                    background-color: #e4ecfc;
                    /* Màu nền khi hover hoặc focus */
                }

                .list-group-item input[type="radio"]:checked+.list-group-item {
                    background-color: #e2f0ff;
                    /* Màu nền khi radio button được chọn */
                }

                #questionSection {
                    display: none;
                }
            </style>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Khai báo biến để lưu trữ ID của interval
        let timerInterval;
        // Khai báo biến để lưu trữ thời gian còn lại (đơn vị: giây)
        let currentTime = 50; // Thay đổi thành 5s/60 phút (5s/60 phút * 60 giây)
        let timerPaused = false;

        // Hàm cập nhật đồng hồ
        function updateClock() {
            if (!timerPaused) {
                // Tính toán số phút và số giây từ thời gian còn lại
                let minutes = Math.floor(currentTime / 60);
                let seconds = currentTime % 60;

                // Định dạng hiển thị của thời gian
                let displayMinutes = minutes < 10 ? '0' + minutes : minutes;
                let displaySeconds = seconds < 10 ? '0' + seconds : seconds;

                // Hiển thị thời gian trên giao diện
                document.getElementById('timer').textContent = displayMinutes + ':' + displaySeconds;

                // Giảm thời gian còn lại mỗi giây
                currentTime--;

                // Kiểm tra xem thời gian còn lại có âm không (hết thời gian)
                if (currentTime < 0) {
                    // Hiển thị thông báo khi hết thời gian
                    alert('Bạn đã hết thời gian làm bài!');

                    // Vô hiệu hóa các nút radio button và ô chọn câu trả lời
                    let radioButtons = document.querySelectorAll('input[type="radio"]');
                    radioButtons.forEach(function(radioButton) {
                        radioButton.disabled = true;
                    });

                    // Vô hiệu hóa nút "TẠM NGỪNG THỜI GIAN"
                    if (document.getElementById('pauseTimer'))
                        document.getElementById('pauseTimer').disabled = true;

                    // Dừng đồng hồ bằng cách xóa interval
                    clearInterval(timerInterval);
                }
            } else {
                // Nếu đồng hồ đang được tạm ngừng, vô hiệu hóa các câu trả lời
                let radioButtons = document.querySelectorAll('input[type="radio"]');
                radioButtons.forEach(function(radioButton) {
                    radioButton.disabled = true;
                });
            }
        }

        // Hàm bắt đầu tính giờ
        function startTimer() {
            // Hiển thị phần "CÁC CÂU HỎI"
            document.getElementById('questionSection').style.display = 'block';
            // Gọi hàm cập nhật đồng hồ để bắt đầu đếm ngược
            updateClock();
            // Lặp lại việc cập nhật đồng hồ mỗi giây và lưu trữ ID của interval
            timerInterval = setInterval(updateClock, 1000);
            // Vô hiệu hóa nút "BẮT ĐẦU TÍNH GIỜ" sau khi bấm
            document.getElementById('startTimer').disabled = true;
            // Bỏ vô hiệu hóa nút "TẠM NGỪNG THỜI GIAN"
            if (document.getElementById('pauseTimer'))
                document.getElementById('pauseTimer').disabled = false;
        }


        // Hàm tạm ngừng/thiết lập tiếp tục tính giờ
        function pauseTimer() {
            timerPaused = !timerPaused;
            let pauseButton = document.getElementById('pauseTimer');
            pauseButton.textContent = timerPaused ? 'TIẾP TỤC THỜI GIAN' : 'TẠM NGỪNG THỜI GIAN';
        }
    </script>
@endpush

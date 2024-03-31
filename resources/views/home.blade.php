@extends('layouts.app')

@section('content')
    <div class="px-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Giới thiệu hệ thống -->
                <div class="mb-4">
                    <h2 class="fw-bold">GIỚI THIỆU HỆ THỐNG</h2>
                    <p style="text-align: justify;" class="text-justify">
                        HUTECH QUIZ là một phần mở rộng của hệ thống HUTECH CLASSROOM, tập trung đặc biệt vào quản lý và
                        tổ chức các bài kiểm tra trắc nghiệm trực tuyến. Được phát triển bởi đội ngũ Sinh Viên Khoa Công
                        nghệ thông tin tại Trường Đại học Công nghệ TPHCM HUTECH, hệ thống này mang lại cho Giảng Viên
                        và Sinh Viên trải nghiệm học tập tối ưu và hiệu quả. Với HUTECH QUIZ, Giảng Viên có khả năng tạo
                        và quản lý các bài kiểm tra trắc nghiệm một cách linh hoạt, đồng thời theo dõi kết quả của Sinh
                        Viên một cách tức thì. Hệ thống cung cấp giao diện thân thiện và dễ sử dụng, giúp Giảng Viên dễ
                        dàng thiết lập các câu hỏi, đặt thời gian, và quản lý danh sách Sinh Viên tham gia kiểm tra. Đối
                        với Sinh Viên, HUTECH QUIZ tạo ra môi trường kiểm tra trực tuyến an toàn và minh bạch. Sinh Viên
                        có thể truy cập bài kiểm tra từ bất kỳ đâu, đặc biệt là trong khuôn khổ của HUTECH CLASSROOM,
                        giúp họ linh hoạt trong quá trình học tập. Kết quả được hiển thị ngay sau khi hoàn thành bài
                        kiểm tra, cung cấp phản hồi chi tiết để Sinh Viên có thể tự đánh giá và cải thiện kiến thức của
                        mình. Với sự kết hợp hoàn hảo giữa HUTECH CLASSROOM và HUTECH QUIZ, hệ thống giúp tối ưu hóa quá
                        trình học tập trực tuyến, tạo ra một môi trường học thuận lợi và hiệu quả cho cả Giảng Viên và
                        Sinh Viên tại Trường Đại học Công nghệ TPHCM HUTECH.
                    </p>
                </div>

                <!-- Khung card tham gia phòng thi -->
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('images/banner-hutech-quiz.png') }}" alt="phòng thi" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">BỘ ĐỀ - PHÒNG THI</h5>
                                <p class="card-text">Tham gia phòng thi tại đây để đánh giá năng lực của bản thân từ việc
                                    kiểm tra các kiến thức chuyên môn được soạn sẵn thông qua các bộ đề chất lượng, khoa học
                                    và hiệu quả.</p>
                                <a href="" class="btn btn-primary">THAM GIA PHÒNG THI</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

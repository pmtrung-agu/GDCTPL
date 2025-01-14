<?php
return  [
    'menu' => array(
        0 => array(
                'title' 	=> 'Thông tin',
                'path' 		=> 'thong-tin',
                'icon'      => 'far fa-newspaper'
                /*'childs' 	=> array (
                    array('title' => 'Chuyển đổi số', 'path' => 'chuyen-doi-so'),
                    array('title' => 'Sự kiện', 'path' => 'Sự kiện'),
                    array('title' => 'Doanh nghiệp', 'path' => 'doanh-nghiep'),
                    array('title' => 'Xã hội', 'path' => 'xa-hoi')
                
                )*/
        ),
        1 => array(
            'title' 	=> 'Sản phẩm',
            'path' 		=> 'san-pham',
            'icon'      => 'fab fa-product-hunt'
            /*'childs'	=> array(
                array('title' => 'Đặc sản', 'path' => 'dac-san'),
                array('title' => 'Hàng tiêu dùng', 'path' => 'hang-tieu-dung'),
                array('title' => 'Gạo nếp', 'path' => 'gao-nep'),
                array('title' => 'Thực phẩm', 'path' => 'thuc-pham'),
                array('title' => 'Thủy sản', 'path' => 'thuy-san'),
                array('title' => 'Thủ công - Mỹ nghệ', 'path' => 'thu-cong-my-nghe'),
                array('title' => 'Rau - Củ - Quả', 'path' => 'rau-cu-qua'),
                array('title' => 'Trà - Cà phê', 'path' => 'tra-ca-phe'),
                array('title' => 'Mỹ phẩm - Dược phẩm', 'path' => 'my-pham-duoc-pham'),
                array('title' => 'Giáo dục', 'path' => 'giao-duc'),
                array('title' => 'Tư vấn Chuyển đổi số', 'path' => 'giao-duc'),
                array('title' => 'Dịch vụ khác', 'path' => 'dich-vu-khac'),
            )*/
        ),
        2 => array(
            'title' 	=> 'Tài liệu',
            'path' 		=> 'tai-lieu',
            'icon'      => 'fas fa-book-open'
            /*'childs'	=> array(
                array('title' => 'Văn bản', 'path' => 'van-ban'),
                array('title' => 'Tri thức', 'path' => 'tri-thuc'),
                array('title' => 'Video Chuyển đổi số', 'path' => 'video-chuyen-doi-so'),
                array('title' => 'Thông tin hỏi đáp', 'path' => 'thong-tin-hoi-dap')
            )*/
        ),
        3 => array(
            'title' 	=> 'Doanh nghiệp',
            'path' 		=> 'doanh-nghiep',
            'icon'      => 'fas fa-user-tie',
            'childs'	=> array(
                array('title' => 'Doanh Nghiệp tham gia', 'path' => 'doanh-nghiep'),
                array('title' => 'Tư vấn chuyển đổi số', 'path' => 'tu-van-chuyen-doi-so'),
                array('title' => 'Nhu cầu chuyển đổi số', 'path' => 'nhu-cau-chuyen-doi-so')
            )
        ),
        4 => array(
            'title' 	=> 'Chuyên gia',
            'path' 		=> 'chuyen-gia',
            'icon'      => 'fas fa-user-plus'
        ),
        5 => array(
            'title' 	=> 'Khảo sát mức độ CĐS',
            'path' 		=> 'khao-sat-muc-do-cds',
            'icon'      => 'fas fa-list-alt',
            'childs' => array(
                array('title' => 'Dữ liệu khảo sát', 'path' => 'du-lieu'),
                array('title' => 'Biểu đồ', 'path' => 'bieu-do'),
                array('title' => 'Công thức chuyển đổi số', 'path' => 'cong-thuc'),
                array('title' => 'Kết quả phân tích', 'path' => 'phan-tich'),
                array('title' => 'Kết quả theo Doanh nghiệp', 'path' => 'theo-doanh-nghiep')
            )
        ),
    ),
    'menu-home' => array(
        0 => array(
            'title' 	=> 'Thông tin',
            'path' 		=> 'thong-tin',
            'icon'      => 'far fa-newspaper'
        ),
        1 => array(
            'title' 	=> 'Sản phẩm',
            'path' 		=> 'san-pham',
            'icon'      => 'fab fa-product-hunt'
        ),
        2 => array(
            'title' 	=> 'Tài liệu',
            'path' 		=> 'tai-lieu',
            'icon'      => 'fas fa-book-open',
        ),
        3 => array(
            'title' 	=> 'Doanh nghiệp',
            'path' 		=> 'doanh-nghiep',
            'icon'      => 'fas fa-user-tie',
            'childs'	=> array(                
                array('title' => 'Doanh nghiệp tham gia', 'path' => 'doanh-nghiep-tham-gia'),
                array('title' => 'Tư vấn chuyển đổi số', 'path' => 'tu-van-chuyen-doi-so'),
                array('title' => 'Gởi nhu cầu chuyển đổi số', 'path' => 'goi-yeu-cau'),
                array('title' => 'Khảo sát mức độ CĐS', 'path' => 'khao-sat-muc-do-cds'),
                array('title' => 'Đăng ký thành viên', 'path' => 'dang-ky-thanh-vien')
            )
        ),
        4 => array(
            'title' 	=> 'Chuyên gia',
            'path' 		=> 'chuyen-gia',
            'icon'      => 'fas fa-user-plus',
            'childs'    => array(
                array('title' => 'Danh sách Chuyên gia', 'path' => 'danh-sach'),
                array('title' => 'Gởi tin nhắn đến chuyên gia', 'path' => 'goi-tin-nhan-den-chuyen-gia')
            )
        )
    ),
] 
?>
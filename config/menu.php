<?php
return  [
    'menu' => array(
        0 => array(
                'title' 	=> 'Thông tin',
                'path' 		=> 'thong-tin',
                'icon'      => 'far fa-newspaper',
                'role'      => 'Admin,Manager,Business,ABA,Expert,Customer,User'
        ),
        1 => array(
            'title' 	=> 'Sản phẩm',
            'path' 		=> 'san-pham',
            'icon'      => 'fab fa-product-hunt',
            'role'      => 'Admin,Manager,Business,ABA'
        ),
        2 => array(
            'title' 	=> 'Tài liệu',
            'path' 		=> 'tai-lieu',
            'icon'      => 'fas fa-book-open',
            'role'      => 'Admin,Manager,Business,ABA'
        ),
        3 => array(
            'title' 	=> 'Doanh nghiệp',
            'path' 		=> 'doanh-nghiep',
            'icon'      => 'fas fa-user-tie',
            'childs'	=> array(
                array('title' => 'Doanh Nghiệp tham gia', 'path' => 'danh-sach'),
                array('title' => 'Tư vấn chuyển đổi số', 'path' => 'tu-van-chuyen-doi-so'),
                array('title' => 'Nhu cầu chuyển đổi số', 'path' => 'nhu-cau-chuyen-doi-so')
            ),
            'role'      => 'Admin,Manager,Business,ABA'
        ),
        4 => array(
            'title' 	=> 'Chuyên gia',
            'path' 		=> 'chuyen-gia',
            'icon'      => 'fas fa-user-plus',
            'role'      => 'Admin,Manager,Business,ABA,Expert,Customer,User',
        ),
        5 => array(
            'title' 	=> 'Khảo sát mức độ CĐS',
            'path' 		=> 'khao-sat-muc-do-cds',
            'icon'      => 'fas fa-list-alt',
            'role'      => 'Admin,Manager,Business,ABA,Expert,Customer,User',
            'childs' => array(
                array('title' => 'Dữ liệu khảo sát', 'path' => 'du-lieu'),
                array('title' => 'Biểu đồ', 'path' => 'bieu-do'),
                array('title' => 'Kết quả phân tích', 'path' => 'phan-tich'),
                array('title' => 'Kết quả theo Doanh nghiệp', 'path' => 'theo-doanh-nghiep'),
                array('title' => 'Kết quả theo Ngành nghề', 'path' => 'theo-nganh-nghe'),
                array('title' => 'Kết quả theo Lĩnh vực', 'path' => 'theo-linh-vuc')
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
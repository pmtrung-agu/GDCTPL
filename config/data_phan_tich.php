<?php
return [
    'bang_1' => array (    
        array('8.1','Rào cản về chi phí đầu tư, ứng dụng công nghệ',114),
        array('8.2','Khó khăn trong thay đổi thói quen, tập quán kinh doanh',115),
        array('8.3','Thiếu nhân lực nội bộ để ứng dụng công nghệ số', 116),
        array('8.4','Thiếu cơ sở hạ tầng công nghệ số', 117),
        array('8.5','Thiếu thông tin về công nghệ số',118),
        array('8.6','Khó khăn trong tích hợp các giải pháp công nghệ số', 119),
        array('8.7','Thiếu cam kết, hiểu biết của Ban lãnh đạo, quản lý doanh nghiệp', 120),
        array('8.8','Thiếu cam kết, hiểu biết của người lao động', 121),
        array('8.9','Sợ rò rỉ dữ liệu cá nhân/ doanh nghiệp', 122)
    ),
    'bang_3' => array(
        array(1,'Trải nghiệm số cho khách hàng',0.203, 25),
        array(2,'Chiến lược số',0.078, 28),
        array(3,'Hạ tầng và Công nghệ số',0.25, 46),
        array(4,'Vận hành',0.203, 61),
        array(5,'Chuyển đổi số văn hóa doanh nghiệp',0.156, 73),
        array(6,'Dữ liệu và tài sản thông tin',0.109, 82)
    ),
    'bang_10' => array(
        array('0',263, 'Hoàn toàn không'),
        array('1',14, 'Có nhưng hầu như không đủ'),
        array('2',10, 'Có tương đối, hầu như đáp ứng các nhu cầu khi cần'),
        array('3',8,'Đáp ứng trung bình'),
        array('4 & 5',10, 'Luôn ưu tiên, đáp ứng đầy đủ khi cần')
    ), 
    'bang_11' => array(
        array('Nhỏ',199),
        array('Siêu nhỏ',83),
        array('Vừa',23)
    ),
    'nhu_cau' => array(
        'Xây dựng phần mềm quản lý',
        'Xây dựng website giới thiệu',
        'Xây dựng Website TMĐT',
        'Khảo sát và Tư vấn Chuyển đổi số Doanh nghiệp',
        'Tập huấn về Chuyển đổi số Doanh nghiệp',
        'Nhu cầu khác'
    ), 
    'nhu_cau_kngt' => array(
        'Cần mua',
        'Cần bán',
        'Cần cung cấp',
        'Nhu cầu khác'
    ), 
    'muc_do' => array(
        1 => array (
            'title' => 'Mức độ 1: Khởi đầu (Ad Hoc/Initial)',
            'dac_diem' => array(
                'Chưa có chiến lược chuyển đổi số rõ ràng.',
                'Công nghệ số chưa được ứng dụng hoặc chỉ ở mức cơ bản.',
                'Vận hành theo mô hình truyền thống, phụ thuộc nhiều vào giấy tờ và thủ công.'
            ),
            'loi_khuyen' => array(
                'Nâng cao nhận thức: Ban lãnh đạo cần hiểu rõ tầm quan trọng của chuyển đổi số để định hướng cho doanh nghiệp.',
                'Xây dựng kế hoạch: Bắt đầu với một chiến lược chuyển đổi số đơn giản, xác định các mục tiêu ngắn hạn và dài hạn.',
                'Đầu tư vào công nghệ cơ bản: Sử dụng phần mềm kế toán, quản lý khách hàng (CRM), hoặc lưu trữ đám mây để số hóa dữ liệu.',
                'Đào tạo nhân sự: Tổ chức các khóa học cơ bản về kỹ năng số cho nhân viên.'
            )
        ),
        2 => array(
            'title' => 'Mức độ 2: Đang thí điểm (Emerging/Opportunistic)',
            'dac_diem' => array(
                'Một số bộ phận đã bắt đầu thử nghiệm công nghệ số.',
                'Chuyển đổi số chưa đồng bộ, chưa có chiến lược tổng thể.',
                'Nhân viên chưa có nhiều kỹ năng công nghệ.'
            ),
            'loi_khuyen' => array(
                'Chuẩn hóa dữ liệu và quy trình: Áp dụng phần mềm quản lý doanh nghiệp (ERP), tự động hóa quy trình cơ bản.',
                'Tăng cường bảo mật thông tin: Xây dựng chính sách an ninh mạng để bảo vệ dữ liệu khách hàng.',
                'Xây dựng đội ngũ công nghệ: Thành lập bộ phận hoặc thuê chuyên gia công nghệ để hỗ trợ quá trình chuyển đổi số.',
                'Tiếp tục đào tạo: Trang bị kỹ năng số cho nhân sự, đặc biệt là sử dụng các công cụ số mới.'
            )
        ),
        3 => array(
            'title' => 'Mức độ 3: Đang phát triển (Formalized/Integrated)',
            'dac_diem' => array(
                'Doanh nghiệp có chiến lược chuyển đổi số cụ thể, đang triển khai trên nhiều lĩnh vực.',
                'Công nghệ được tích hợp vào một số quy trình chính, nhưng chưa tối ưu hoàn toàn.',
                'Dữ liệu bắt đầu được sử dụng để hỗ trợ ra quyết định.'
            ),
            'loi_khuyen' => array(
                'Tích hợp hệ thống công nghệ: Sử dụng AI, dữ liệu lớn (Big Data) và IoT để tối ưu hóa hoạt động.',
                'Số hóa toàn bộ quy trình nội bộ: Hướng đến môi trường làm việc không giấy tờ, áp dụng hệ thống quản lý tài liệu số.',
                'Tăng cường cá nhân hóa dịch vụ: Ứng dụng công nghệ để nâng cao trải nghiệm khách hàng (Chatbot AI, phân tích dữ liệu khách hàng).',
                'Đo lường hiệu quả: Đặt KPI cụ thể để theo dõi tác động của chuyển đổi số đến năng suất và lợi nhuận.'
            )
        ),
        4 => array(
            'title' => ' Mức độ 4: Dẫn đầu trong nội bộ (Strategic/Optimized)',
            'dac_diem' => array(
                'Công nghệ số được áp dụng trên diện rộng trong toàn doanh nghiệp.',
                'Các quy trình đã được tự động hóa, ra quyết định dựa trên dữ liệu.',
                'Văn hóa đổi mới đã phát triển mạnh mẽ trong doanh nghiệp.'
            ),
            'loi_khuyen' => array(
                'Mở rộng hệ sinh thái số: Hợp tác với đối tác công nghệ, sử dụng API để tích hợp nhiều hệ thống khác nhau.',
                'Tận dụng AI & Machine Learning: Dự đoán xu hướng thị trường, tối ưu chuỗi cung ứng và quản lý tài nguyên.',
                'Phát triển mô hình kinh doanh số: Xem xét chuyển đổi sang thương mại điện tử, dịch vụ số hoặc mô hình kinh doanh nền tảng (platform business).',
                'Liên tục đổi mới: Thiết lập đội ngũ nghiên cứu & phát triển (R&D) để khám phá công nghệ mới và cải thiện quy trình.'
            )
        ),
        5 => array(
            'title' => 'Mức độ 5: Dẫn đầu ngành (Innovative/Transformative)',
            'dac_diem' => array(
                'Doanh nghiệp đã chuyển đổi số hoàn toàn, hoạt động theo mô hình doanh nghiệp số.',
                'Dữ liệu là tài sản cốt lõi, hỗ trợ ra quyết định chiến lược.',
                'Có lợi thế cạnh tranh mạnh mẽ nhờ công nghệ tiên tiến.'
            ),
            'loi_khuyen' => array(
                'Mở rộng phạm vi hoạt động: Sử dụng công nghệ để mở rộng ra thị trường quốc tế.',
                'Tiên phong đổi mới: Nghiên cứu, phát triển và ứng dụng công nghệ mới như blockchain, metaverse, AI tiên tiến.',
                'Tạo ra giá trị mới: Không chỉ ứng dụng công nghệ, mà còn tạo ra mô hình kinh doanh mới dựa trên công nghệ.',
                'Chủ động trong an toàn thông tin: Tăng cường bảo mật dữ liệu, bảo vệ quyền riêng tư của khách hàng.'
            )
        ),

    ),
    'muc_do_tom_lai' => array(
        'Doanh nghiệp ở mức thấp nên tập trung vào công nghệ cơ bản và đào tạo nhân sự.',
        'Doanh nghiệp ở mức trung bình nên chuẩn hóa quy trình, mở rộng ứng dụng công nghệ.',
        'Doanh nghiệp ở mức cao nên tận dụng công nghệ tiên tiến và sáng tạo mô hình kinh doanh mới.'
    ),
    'muc_do_nganh_nghe' => array(
        'Nông, lâm nghiệp, thủy sản' => array(
                1 => array(
                    'Sử dụng hệ thống quản lý trang trại số để theo dõi sản xuất.',
                    'Ứng dụng công nghệ cảm biến IoT để đo độ ẩm, nhiệt độ đất.',
                    'Đào tạo nông dân sử dụng ứng dụng di động để giám sát mùa vụ.'
                ),
                2 => array(
                    'Sử dụng hệ thống quản lý trang trại số để theo dõi sản xuất.',
                    'Ứng dụng công nghệ cảm biến IoT để đo độ ẩm, nhiệt độ đất.',
                    'Đào tạo nông dân sử dụng ứng dụng di động để giám sát mùa vụ.'
                ),
                3 => array(
                    'Triển khai AI và dữ liệu lớn (Big Data) để dự báo thời tiết, tối ưu hóa trồng trọt.',
                    'Sử dụng blockchain để truy xuất nguồn gốc sản phẩm nông nghiệp.',
                    'Kết nối với các sàn thương mại điện tử để mở rộng kênh bán hàng trực tuyến.'
                ),
                4 => array(
                    'Triển khai AI và dữ liệu lớn (Big Data) để dự báo thời tiết, tối ưu hóa trồng trọt.',
                    'Sử dụng blockchain để truy xuất nguồn gốc sản phẩm nông nghiệp.',
                    'Kết nối với các sàn thương mại điện tử để mở rộng kênh bán hàng trực tuyến.'
                ),
                5 => array(
                    'Phát triển nông nghiệp thông minh với hệ thống robot tự động hóa trong sản xuất.',
                    'Ứng dụng drones để giám sát mùa vụ, phun thuốc chính xác.',
                    'Xây dựng nền tảng giao dịch nông sản số dựa trên hợp đồng thông minh (smart contracts).'
                )
            ),
        'Công nghiệp chế biến, chế tạo' => array(
                1 => array(
                    'Áp dụng phần mềm quản lý sản xuất (MES) để giám sát dây chuyền.',
                    'Số hóa quy trình kiểm tra chất lượng sản phẩm.'
                ),
                2 => array(
                    'Áp dụng phần mềm quản lý sản xuất (MES) để giám sát dây chuyền.',
                    'Số hóa quy trình kiểm tra chất lượng sản phẩm.'
                ),
                3 => array(
                    'Triển khai IoT và AI để tối ưu hóa quy trình sản xuất.',
                    'Tích hợp ERP & SCADA để quản lý chuỗi cung ứng.'
                ),
                4 => array(
                    'Triển khai IoT và AI để tối ưu hóa quy trình sản xuất.',
                    'Tích hợp ERP & SCADA để quản lý chuỗi cung ứng.'
                ),
                5 => array(
                    'Ứng dụng công nghệ in 3D, AI và robot tự động trong sản xuất.',
                    'Phát triển nhà máy thông minh (Smart Factory) với dữ liệu thời gian thực.'
                )
            ),
        'Hoạt động hành chính và hỗ trợ dịch vụ' => array(
                1 => array(
                    'Số hóa hồ sơ, quản lý nhân sự bằng phần mềm HRM.',
                    'Triển khai phần mềm kế toán tự động.'
                ),
                2 => array(
                    'Số hóa hồ sơ, quản lý nhân sự bằng phần mềm HRM.',
                    'Triển khai phần mềm kế toán tự động.'
                ),
                3 => array(
                    'Tích hợp RPA (Robotic Process Automation) để tự động hóa quy trình hành chính.',
                    'Ứng dụng AI để phân tích hiệu suất nhân viên.'
                ),
                4 => array(
                    'Tích hợp RPA (Robotic Process Automation) để tự động hóa quy trình hành chính.',
                    'Ứng dụng AI để phân tích hiệu suất nhân viên.'
                ),
                5 => array(
                    'Áp dụng AI chatbot hỗ trợ khách hàng, tự động trả lời yêu cầu hành chính.',
                    'Xây dựng nền tảng quản trị doanh nghiệp số dựa trên dữ liệu lớn.'
                ),
            ),
        'Bán buôn và bán lẻ' => array(
                1 => array(
                    'Xây dựng website và ứng dụng bán hàng để mở rộng kênh online.',
                    'Sử dụng phần mềm POS để quản lý kho hàng.'
                ),
                2 => array(
                    'Xây dựng website và ứng dụng bán hàng để mở rộng kênh online.',
                    'Sử dụng phần mềm POS để quản lý kho hàng.'
                ),
                3 => array(
                    'Ứng dụng AI để cá nhân hóa trải nghiệm mua sắm.',
                    'Kết nối Omni-channel (đa kênh) để đồng bộ dữ liệu khách hàng.'
                ),
                4 => array(
                    'Ứng dụng AI để cá nhân hóa trải nghiệm mua sắm.',
                    'Kết nối Omni-channel (đa kênh) để đồng bộ dữ liệu khách hàng.'
                ),
                5 => array(
                    'Triển khai cửa hàng thông minh không cần thu ngân (giống Amazon Go).',
                    'Sử dụng blockchain để minh bạch hóa chuỗi cung ứng.'
                ),
            ),
        'Xây dựng' => array(
                1 => array(
                    'Áp dụng phần mềm quản lý dự án xây dựng (BIM, AutoCAD).',
                    'Số hóa tài liệu thi công để dễ dàng truy cập.'
                ),
                2 => array(
                    'Áp dụng phần mềm quản lý dự án xây dựng (BIM, AutoCAD).',
                    'Số hóa tài liệu thi công để dễ dàng truy cập.'
                ),
                3 => array(
                    'Dùng IoT để giám sát máy móc, quản lý năng lượng.',
                    'Sử dụng drone để khảo sát công trình tự động.'
                ),
                4 => array(
                    'Dùng IoT để giám sát máy móc, quản lý năng lượng.',
                    'Sử dụng drone để khảo sát công trình tự động.'
                ),
                5 => array(
                    'Áp dụng công nghệ in 3D để xây dựng nhanh hơn, tiết kiệm chi phí.',
                    ' Xây dựng công trình thông minh với AI và cảm biến IoT.'
                )
            ),
        'Hoạt động chuyên môn, khoa học và công nghệ' => array(
                1 => array(
                    'Sử dụng phần mềm quản lý dự án và nghiên cứu.',
                    'Xây dựng hệ thống lưu trữ dữ liệu khoa học trên nền tảng số.'
                ),
                2 => array(
                    'Sử dụng phần mềm quản lý dự án và nghiên cứu.',
                    'Xây dựng hệ thống lưu trữ dữ liệu khoa học trên nền tảng số.'
                ),
                3 => array(
                    'Tích hợp AI và phân tích dữ liệu lớn trong nghiên cứu khoa học.',
                    'Ứng dụng blockchain để bảo vệ sở hữu trí tuệ.'
                ),
                4 => array(
                    'Tích hợp AI và phân tích dữ liệu lớn trong nghiên cứu khoa học.',
                    'Ứng dụng blockchain để bảo vệ sở hữu trí tuệ.'
                ),
                5 => array(
                    'Phát triển nền tảng nghiên cứu mở (Open Science Platform).',
                    'Sử dụng AI trong phân tích và sáng tạo công nghệ mới.'
                )
            ),
        'Dịch vụ lưu trú và ăn uống' => array(
                1 => array(
                    'Số hóa đặt phòng, tích hợp hệ thống thanh toán online.',
                    'Xây dựng website & app quản lý khách sạn, nhà hàng.'
                ),
                2 => array(
                    'Số hóa đặt phòng, tích hợp hệ thống thanh toán online.',
                    'Xây dựng website & app quản lý khách sạn, nhà hàng.'
                ),
                3 => array(
                    'Ứng dụng AI chatbot hỗ trợ đặt chỗ, giải đáp khách hàng.',
                    'Triển khai hệ thống quản lý khách sạn thông minh.'
                ),
                4 => array(
                    'Ứng dụng AI chatbot hỗ trợ đặt chỗ, giải đáp khách hàng.',
                    'Triển khai hệ thống quản lý khách sạn thông minh.'
                ),
                5 => array(
                    'Tạo khách sạn không nhân viên với AI và robot.',
                    'Phát triển nhà hàng thông minh sử dụng dữ liệu lớn để dự báo nhu cầu khách hàng.'
                )
            ),
        'Giáo dục đào tạo' => array(
                1 => array(
                    'Áp dụng hệ thống quản lý đào tạo (LMS) để số hóa bài giảng.',
                    'Sử dụng Zoom, Microsoft Teams để dạy học trực tuyến.'
                ),
                2 => array(
                    'Áp dụng hệ thống quản lý đào tạo (LMS) để số hóa bài giảng.',
                    'Sử dụng Zoom, Microsoft Teams để dạy học trực tuyến.'
                ),
                3 => array(
                    'Tích hợp AI & phân tích dữ liệu để cá nhân hóa trải nghiệm học tập.',
                    'Ứng dụng VR/AR trong giảng dạy thực hành.'
                ),
                4 => array(
                    'Tích hợp AI & phân tích dữ liệu để cá nhân hóa trải nghiệm học tập.',
                    'Ứng dụng VR/AR trong giảng dạy thực hành.'
                ),
                5 => array(
                    'Xây dựng nền tảng giáo dục số sử dụng blockchain để xác thực bằng cấp.',
                    'Phát triển trường học ảo (Metaverse School).'
                ),
            ),
        'Vận tải kho bãi' => array(
            1 => array(
                'Sử dụng phần mềm quản lý logistics (TMS, WMS) để số hóa vận hành.',
                'Triển khai ứng dụng theo dõi đơn hàng trực tuyến.',
                'Sử dụng phần mềm quản lý kho'
            ),
            2 => array(
                'Sử dụng phần mềm quản lý logistics (TMS, WMS) để số hóa vận hành.',
                'Triển khai ứng dụng theo dõi đơn hàng trực tuyến.',
                'Sử dụng phần mềm quản lý kho'
            ),
            3 => array(
                'Tích hợp AI để tối ưu hóa lộ trình giao hàng.',
                'Ứng dụng cảm biến IoT để giám sát hàng hóa theo thời gian thực.'
            ),
            4 => array(
                'Tích hợp AI để tối ưu hóa lộ trình giao hàng.',
                'Ứng dụng cảm biến IoT để giám sát hàng hóa theo thời gian thực.'
            ),
            5 => array (
                'Sử dụng xe tự hành (autonomous vehicles) và drone để giao hàng.',
                'Áp dụng blockchain trong quản lý chuỗi cung ứng toàn cầu.'
            )
        )

    ),
    'muc_do_nganh_nghe_tom_lai' => array(
        'Ngành nông nghiệp, chế biến, xây dựng cần tập trung vào IoT, AI và blockchain.',
        'Ngành bán lẻ, dịch vụ, giáo dục nên áp dụng AI, Big Data, VR/AR.',
        'Ngành vận tải, logistics cần tự động hóa, AI và blockchain.'
    )

]
?>
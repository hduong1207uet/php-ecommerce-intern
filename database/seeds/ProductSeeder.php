<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $products = [
            ['name' => 'Taylor 114CE', 'price' => '1800', 'supplier' => 'Taylor', 'category_id' => '1', 'avg_rate' => '0','featured_img' => 'TAYLOR114CE.jpg',
                'description' => '<b>Đàn guitar Taylor 114CE</b> là cây đàn guitar thuộc thương hiệu taylor nhưng có series nhỏ nhất, tuy vậy chất lượng của nó cũng mang đậm bản chất Taylor. Đàn Guitar Taylor 114CE tương tự Guitar Taylor Series 200, Series 100 cung cấp khả năng phục hồi trong điều kiện khí hậu biến đổi, và cần đàn hẹp hơn một chút, 1 11/16-inch. Đó là một trong những cây guitar tốt nhất bạn sẽ tìm thấy, phù hợp với túi tiền của mình, đặc biệt với sự tích hợp của pickup Taylor ® ES-T. Taylor 100 series thực sự là sự lựa chọn phù hợp cho những người mới chơi nhưng vẫn mang lại hiệu suất âm thanh và tiện ích đáng kinh ngạc.<br>
                Đàn guitar Taylor 114CE có dáng Grand Auditorium, là dáng đàn phổ biến và linh hoạt nhất của Taylor. Grand Auditorium có kích thước cỡ trung với tỷ lệ tinh tế, nhỏ hơn Dreadnought và lớn hơn Grand Concert, thích hợp với mọi mục đích chơi đàn từ mới tập đến biểu diễn sân khấu. Đàn có tone cân bằng, âm lượng và tiếng pass lớn, đặc biệt thích hợp để chơi thể loại fingerstyle.
                <br><br>
                Venetian CutawayCutaways<br>
                Venetian cutaway được biết đến với các đường cong mềm mại. Thiết kế cutaway này mang đến cho Taylor 114CE một vẻ ngoài lạ mắt, cá tính.
                <br>
                Mặt trước đàn làm bằng gỗ Sitka Spruce<br>
                Gỗ sitka Spruce có độ bền và độ dẻo dai cao nên thường được sử dụng rất phổ biến để làm soundboard đàn. Đặc tính của gỗ Sitka Spruce là rất cứng và nhẹ, chính vì vậy đây cũng là loại gỗ có tốc độ truyền âm thanh, độ vang rất cao, giai điệu rất rõ ràng và đầy đủ, có thể chơi rất nhiều phong cách khác nhau.
                <br><br>
                Thân đàn làm bằng gỗ Walnut<br>
                Thân đàn guitar Taylor 114CE làm bằng gỗ Walnut cho âm thanh cực kỳ đặc trưng, cân bằng. Nó mang âm sắc thanh mạnh với tần âm thấp chắc, tần trung mượt mà và tần cao rõ nét. 
                <br><br>
                Thiết bị điện tử Expression System® 2<br>
                Khi nhắc đến Taylor Guitar, chúng ta không thể không kể đến hệ thống Expression Pick-up System được sáng chế độc quyền bởi Taylor. Hệ thống Pick-up này còn được gọi là bộ cảm biến. Nó thu lại toàn bộ dao động một cách chân thật nhất khi chúng ta thể hiện cảm xúc của mình trên Guitar thùng Taylor trước khi đưa ra hệ thống loa ngoài (speaker). Taylor quan điểm rằng, âm thanh phát ra từ Taylor Guitar qua hệ thống Pick-Up đến Speaker sphải là âm thanh trung thực và tự nhiên nhất.
                <br><br>
                Lớp bảo vệ UV<br>
                Kết cấu UV thân thiện với môi trường của Taylor giúp bảo vệ cây đàn guitar của bạn và giữ cho nó luôn mới và trông thật tuyệt vời.',
                'top_side' => "Rosewood solid", 'back_side' => 'Brazilian Rosewood solid', 'hip_side' => 'Pine', 'neck' => 'Rosewood laminated', 'strings' => 'Alice AW436', 'buckcle' => 'Dejung',
            ],
            ['name' => 'Ba đờn T350', 'price' => '350', 'supplier' => 'Ba Đờn', 'category_id' => '1', 'avg_rate' => '0',
                'featured_img' => 'BADONT350.jpg', 'description' => '',
                'top_side' => "Sitka Spruce solid", 'back_side' => 'Western Cedar solid', 'hip_side' => 'Pine', 'neck' => 'Rosewood laminated', 'strings' => 'Alice AW436', 'buckcle' => 'Dejung',
            ],
            ['name' => 'Epiphone Dove', 'price' => '220', 'supplier' => 'Epiphone', 'category_id' => '1', 'avg_rate' => '0',
                'featured_img' => 'EPIPHONEDOVE.jpg', 'description' => '',
                'top_side' => "Adirondack Spruce solid", 'back_side' => 'Rosewood solid', 'hip_side' => 'Pine', 'neck' => 'Rosewood laminated', 'strings' => 'Alice AW436', 'buckcle' => 'Dejung',
            ],
            ['name' => 'Epiphone DR-100', 'price' => '800', 'supplier' => 'Epiphone', 'category_id' => '1', 'avg_rate' => '0',
                'featured_img' => 'EPIPHONEDR100.jpg', 'description' => '',
                'top_side' => "Sitka Spruce solid", 'back_side' => 'Rosewood solid', 'hip_side' => 'Western Cedar', 'neck' => 'Rosewood laminated', 'strings' => 'Alice AW436', 'buckcle' => 'Dejung',
            ],
            ['name' => 'Taylor 214C', 'price' => '1800', 'supplier' => 'Taylor', 'category_id' => '2', 'avg_rate' => '0', 'featured_img' => 'Taylor214C.jpg', 
                'description' => '<b>Đàn guitar Taylor 214C</b> là cây đàn guitar thuộc thương hiệu taylor nhưng có series nhỏ nhất, tuy vậy chất lượng của nó cũng mang đậm bản chất Taylor. Đàn Guitar Taylor 214C tương tự Guitar Taylor Series 200, Series 100 cung cấp khả năng phục hồi trong điều kiện khí hậu biến đổi, và cần đàn hẹp hơn một chút, 1 11/16-inch. Đó là một trong những cây guitar tốt nhất bạn sẽ tìm thấy, phù hợp với túi tiền của mình, đặc biệt với sự tích hợp của pickup Taylor ® ES-T. Taylor 100 series thực sự là sự lựa chọn phù hợp cho những người mới chơi nhưng vẫn mang lại hiệu suất âm thanh và tiện ích đáng kinh ngạc.<br>
                Đàn guitar Taylor 214C có dáng Grand Auditorium, là dáng đàn phổ biến và linh hoạt nhất của Taylor. Grand Auditorium có kích thước cỡ trung với tỷ lệ tinh tế, nhỏ hơn Dreadnought và lớn hơn Grand Concert, thích hợp với mọi mục đích chơi đàn từ mới tập đến biểu diễn sân khấu. Đàn có tone cân bằng, âm lượng và tiếng pass lớn, đặc biệt thích hợp để chơi thể loại fingerstyle.
                <br><br>
                Venetian CutawayCutaways<br>
                Venetian cutaway được biết đến với các đường cong mềm mại. Thiết kế cutaway này mang đến cho Taylor 214C một vẻ ngoài lạ mắt, cá tính.
                <br>
                Mặt trước đàn làm bằng gỗ Sitka Spruce<br>
                Gỗ sitka Spruce có độ bền và độ dẻo dai cao nên thường được sử dụng rất phổ biến để làm soundboard đàn. Đặc tính của gỗ Sitka Spruce là rất cứng và nhẹ, chính vì vậy đây cũng là loại gỗ có tốc độ truyền âm thanh, độ vang rất cao, giai điệu rất rõ ràng và đầy đủ, có thể chơi rất nhiều phong cách khác nhau.
                <br><br>
                Thân đàn làm bằng gỗ Walnut<br>
                Thân đàn guitar Taylor 214C làm bằng gỗ Walnut cho âm thanh cực kỳ đặc trưng, cân bằng. Nó mang âm sắc thanh mạnh với tần âm thấp chắc, tần trung mượt mà và tần cao rõ nét. 
                <br><br>
                Thiết bị điện tử Expression System® 2<br>
                Khi nhắc đến Taylor Guitar, chúng ta không thể không kể đến hệ thống Expression Pick-up System được sáng chế độc quyền bởi Taylor. Hệ thống Pick-up này còn được gọi là bộ cảm biến. Nó thu lại toàn bộ dao động một cách chân thật nhất khi chúng ta thể hiện cảm xúc của mình trên Guitar thùng Taylor trước khi đưa ra hệ thống loa ngoài (speaker). Taylor quan điểm rằng, âm thanh phát ra từ Taylor Guitar qua hệ thống Pick-Up đến Speaker sphải là âm thanh trung thực và tự nhiên nhất.
                <br><br>
                Lớp bảo vệ UV<br>
                Kết cấu UV thân thiện với môi trường của Taylor giúp bảo vệ cây đàn guitar của bạn và giữ cho nó luôn mới và trông thật tuyệt vời.',
                'top_side' => "Rosewood solid", 'back_side' => 'Rosewood solid', 'hip_side' => 'Pine', 'neck' => 'Rosewood laminated', 'strings' => 'Alice AW436', 'buckcle' => 'Japan Dejung',
            ],
            ['name' => 'Ba Đờn C200', 'price' => '200', 'supplier' => 'Ba Đờn', 'category_id' => '2', 'avg_rate' => '0',
                'featured_img' => 'BADONC200.jpg', 'description' => '',
                'top_side' => "Engelmann Spruce solid", 'back_side' => 'Rosewood solid', 'hip_side' => 'Pine', 'neck' => 'Rosewood laminated', 'strings' => 'Alice AW436', 'buckcle' => 'Dejung',
            ],
            ['name' => 'Taylor 280C', 'price' => '280', 'supplier' => 'Taylor', 'category_id' => '2', 'avg_rate' => '0',
                'featured_img' => 'TAYLORC280.jpg', 'description' => '',
                'top_side' => "Western Cedar solid", 'back_side' => 'Western Cedar solid', 'hip_side' => 'Western Cedar', 'neck' => 'Rosewood laminated', 'strings' => 'Alice AW436', 'buckcle' => 'Japan Dejung',
            ],
            ['name' => 'Guitar Trần C500', 'price' => '500', 'supplier' => 'Guitar Trần', 'category_id' => '2', 'avg_rate' => '0',
                'featured_img' => 'TRANC500.jpg', 'description' => '',
                'top_side' => "Rosewood solid", 'back_side' => 'Rosewood solid', 'hip_side' => 'Pine', 'neck' => 'Rosewood laminated', 'strings' => 'Alice AW436', 'buckcle' => 'Dejung',
            ],
        ];

        DB::table('products')->insert($products);
        Schema::enableForeignKeyConstraints();
    }
}

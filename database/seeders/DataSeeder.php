<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        // Create data for user table
        $dataUser = [];
        for ($i=1; $i < 3; $i++) {
            if($i == 1){
                $dataUser[] =[
                    'email' => 'billtran111@email.com',
                    'password' => Hash::make('1234567890'),
                    'full_name' => 'Quản Trị Viên',
                    'phone'	=> '0762000608',
                    'created_at' => new \DateTime,
                ];
            } else {
                $dataUser[] =[
                    'email' => 'admin123@email.com',
                    'password' => Hash::make('admin123'),
                    'full_name' => 'Lâm Trấn Châu',
                    'phone'	=> '0762555608',
                    'created_at' => new \DateTime,
                ];
            }
        };
        DB::table('users')->insert($dataUser);

        // Create data for Brand table
        $tencn = ['Cinema Center','Cinema Sky Blue'];
        $dataBrand = [];
        for ($i=0; $i < 2; $i++) {
            $dataBrand[] =[
                'brandname' => $tencn[$i],
                'address' => rand(1,250). " " . Str::random(6). ", " . "Ho Chi Minh City",
                'brandimage' => 'brand-null.png',
                'created_at' => new \DateTime,
            ];
        };
        DB::table('brand')->insert($dataBrand);

        // Create data for Room table
        $dataRoom = [];
        $dataRoom1 = [];
        for ($j=1; $j < 3; $j++) { 
            for ($i=1; $i < 7; $i++) {
                $dataRoom[] =[
                    'roomname' => 'R0' . $i,
                    'brand_id' => $j,                    
                    'created_at' => new \DateTime,
                ];
            };
        };        
        DB::table('room')->insert($dataRoom,$dataRoom1);

         // Create data for Seat table
         $dataSeat = [];
        for ($b=1; $b < 13; $b++) { 
            for ($a=65; $a < 77; $a++) { 
                for ($i=1; $i < 19; $i++) {
                    if ($a == 65 && $i > 1 && $i < 18){
                        $dataSeat[] =[
                            'seatname' => chr($a) . $i,
                            'cate_seat' => chr($a),
                            'seatprice' => 50000,
                            'room_id' => $b,
                            'created_at' => new \DateTime,
                        ];
                    };
                    if ($a > 65 && $a < 69 && $i > 0 && $i < 19) {
                        $dataSeat[] =[
                            'seatname' => chr($a) . $i,
                            'cate_seat' => chr($a),
                            'seatprice' => 50000,
                            'room_id' => $b,
                            'created_at' => new \DateTime,
                        ];
                    }
                    if ($a > 68 && $a < 72 && $i > 0 && $i < 19) {
                        $dataSeat[] =[
                            'seatname' => chr($a) . $i,
                            'cate_seat' => chr($a),
                            'seatprice' => 58000,
                            'room_id' => $b,
                            'created_at' => new \DateTime,
                        ];
                    }

                    if ($a == 73 && $i > 2 && $i < 17){
                        $dataSeat[] =[
                            'seatname' => chr($a) . $i,
                            'cate_seat' => chr($a),
                            'seatprice' => 58000,
                            'room_id' => $b,
                            'created_at' => new \DateTime,
                        ];
                    };
                    if ($a == 74 && $i > 4 && $i < 15){
                        $dataSeat[] =[
                            'seatname' => chr($a) . $i,
                            'cate_seat' => chr($a),
                            'seatprice' => 65000,
                            'room_id' => $b,
                            'created_at' => new \DateTime,
                        ];
                    };
                    if ($a == 75 && $i > 4 && $i < 15){
                        $dataSeat[] =[
                            'seatname' => chr($a) . $i,
                            'cate_seat' => chr($a),
                            'seatprice' => 65000,
                            'room_id' => $b,
                            'created_at' => new \DateTime,
                        ];
                    };
                    if ($a == 76 && $i > 5 && $i < 14){
                        $dataSeat[] =[
                            'seatname' => chr($a) . $i,
                            'cate_seat' => chr($a),
                            'seatprice' => 65000,
                            'room_id' => $b,
                            'created_at' => new \DateTime,
                        ];
                    };
                                        
                };
            }
        }
        DB::table('seat')->insert($dataSeat);

        // Create data for Time table
        $dataTime = [];
        $Minute = ["00","15","30","45"];
        // $day = ['Ngày thường','Cuối tuần','Ngày lễ'];
        $day = ['1','2','3'];
        for ($j=8; $j < 23; $j++) {
            for ($k=0; $k < 4; $k++) {
                for ($i=0; $i < 3; $i++) {
                    if($i == 0){
                        if($j == 8 || $j == 9){
                            $dataTime[] =[
                                'time_slot' => '0'.$j. ':' . $Minute[$k],
                                'timeprice' => 5000,
                                'special_day' => $day[$i],
                                'created_at' => new \DateTime,
                            ];
                        } else {
                            $dataTime[] =[
                                'time_slot' => $j. ':' . $Minute[$k],
                                'timeprice' => 5000,
                                'special_day' => $day[$i],
                                'created_at' => new \DateTime,
                            ];
                        }                 
                    } else if($i == 1) {
                        if($j == 8 || $j == 9){
                            $dataTime[] =[
                                'time_slot' => '0'.$j. ':' . $Minute[$k],
                                'timeprice' => 12000,
                                'special_day' => $day[$i],
                                'created_at' => new \DateTime,
                            ];
                        } else {
                            $dataTime[] =[
                                'time_slot' => $j. ':' . $Minute[$k],
                                'timeprice' => 12000,
                                'special_day' => $day[$i],
                                'created_at' => new \DateTime,
                            ];
                        }                       
                    } else if($i == 2) {
                        if($j == 8 || $j == 9){
                            $dataTime[] =[
                                'time_slot' => '0'.$j. ':' . $Minute[$k],
                                'timeprice' => 18000,
                                'special_day' => $day[$i],
                                'created_at' => new \DateTime,
                            ];
                        } else {
                            $dataTime[] =[
                                'time_slot' => $j. ':' . $Minute[$k],
                                'timeprice' => 18000,
                                'special_day' => $day[$i],
                                'created_at' => new \DateTime,
                            ];
                        }                      
                    }                  
                }                           
            }
        };
        DB::table('time')->insert($dataTime);

        // Create data for Category table
        $dataCategory = [];
        $CateArr = ['Hành động','Phiêu lưu','Hài kịch','Lãng mạn','Giả tưởng','Kỳ ảo','Kinh dị','Giật gân'];
        for ($i=0; $i < 8; $i++) {
            $dataCategory[] =[
                'categoryname' => $CateArr[$i],
                'parent_id' => rand(0,3),
                'created_at' => new \DateTime,
            ];
            // $dataCategory[] =[
            //     'categoryname' => chr($j).$i,
            //     'parent_id' => rand(0,5)
            // ];
        };
        DB::table('category')->insert($dataCategory);

        // Create data for film table
        $dataFilm = [];
        $ten = ['HẠNH PHÚC MÁU','ĐÊM HUNG TÀN','TRO TÀN RỰC RỠ','AVATAR: THE WAY OF WATER','BIG TRIP 2: SPICAL DELIVERY','OMG! OH MY GOD','Thanh Sói','PUSS IN BOOTS: THE LAST WISH'];
        $trailer = ['https://www.youtube.com/watch?v=_VQqMUKMBKQ&feature=emb_title','https://www.youtube.com/watch?v=e1gwKLSRDCs','https://www.youtube.com/watch?v=nAsKoWNgIWA&feature=emb_title','https://www.youtube.com/watch?v=gq2xKJXYZ80','https://www.youtube.com/watch?v=kxb4xIkkQ7w','https://www.youtube.com/watch?v=9U7fkTY6HRY','https://www.youtube.com/watch?v=4-C5mC0uSyE','https://www.youtube.com/watch?v=RSqPwPjt0tM'];
        $mota = ['Hạnh Phúc Máu kể về cuộc đời của Hà Phương (NSND Kim Xuân) và câu chuyện gia tộc Vương Đình với một đức tin lạ vận hành niềm tin, sự thịnh vượng của gia tộc. Vào sự kiện quan trọng của gia tộc hàng loạt thảm kịch xảy ra. Sự thật trần trụi về những người chung một dòng máu nhưng khác cuộc đời được phơi bày',' Violent Night lấy bối cảnh một gia đình giàu có bị nhóm lính đánh thuê tấn công nhằm chiếm đoạt tài sản vào đêm Giáng Sinh. Thế nhưng những tên cướp không thể lường trước về cuộc đụng độ đẫm máu với một chiến binh đang cố gắng cứu lấy gia đình, và cứu lấy ngày lễ - ông già Noel. Những kẻ xấu ngạo mạn kia cho rằng nhân vật thần thoại này không có thật và có thể “xử lý” ông một cách nhanh gọn. Thế nhưng, sau đó là liên tiếp những cảnh hành động “máu lửa” và rùng rợn và rồi khán giả sẽ càng “ố dề” với tài nghệ sử dụng vũ khí chuyên nghiệp như súng đạn đến những vật dụng thô sơ trong nhà kho của ông già Noel. Trẻ hư thì cần phạt và cái giá phải trả cho những kẻ khinh thường năng lực của ông già Noel thì không nhân đạo chút nào.','Lấy bối cảnh xóm nghèo miền sông nước Thơm Rơm, “Tro Tàn Rực Rỡ” là câu chuyện tình khắc khoải của ba người phụ nữ dành cho những người đàn ông họ chọn gắn bó cả cuộc đời. Mỗi câu chuyện tình ấy mang những dáng vẻ khác nhau, nhưng tựu trung lại, đều mạnh mẽ và tôn vinh vẻ đẹp tâm hồn rất đỗi nhạy cảm của phái nữ.','Những trích đoạn đầu tiên hé lộ diễn biến cuộc chiến tiếp theo giữa loài người và bộ tộc người Na’vi của hành tinh Pandora, vốn bắt đầu từ phần một. Hành tinh Pandora rực rỡ ở ngay phân cảnh đầu tiên. Tiếp đến, công chúa Neytiri (Zoe Saldana thủ vai) xuất hiện với đôi mắt tràn đầy cảm xúc dưới ánh nắng trong veo. Người xem được đi sâu vào khám phá hành tinh Pandora với nhiều cảnh quan đáng kinh ngạc, trong đó có dưới lòng đại dương sâu thẳm với những loài sinh vật kỳ bí, đúng như tên gọi của phần hai – The Way Of Water.  Năm 2009, bom tấn Avatar của đạo diễn James Cameron công phá phòng vé với doanh thu cao kỷ lục. Avatar như một cột mốc đáng nhớ trong lịch sử điện ảnh, được xem như cuộc cách mạng của công nghệ CGI và cả kỹ xảo 3D. Thành công ngoài mong đợi trong “canh bạc” mạo hiểm mang tên Avatar chính là động lực để James Cameron tự tin với ý tưởng thực hiện Avatar: The Way Of Water. Phần tiếp theo sẽ khai thác về thế giới dưới nước trên Pandora. Bối cảnh tại một vùng vịnh và lấy mốc thời gian cặp đôi Jake Sully và Neytiri đã có con với nhau. Đúng vào lúc này, mối đe dọa từ loài người ở Trái Đất đang cận kề, việc này bắt buộc họ phải tìm cách bảo vệ hành tinh của mình. Do luôn có sự hứng thú với đại dương to lớn, nên chủ đề của Avatar phần mới được di chuyển xuống biển. Một hồ nước khổng lồ được xây dựng với mục đích phục vụ cho công tác quay phim. Bên cạnh đó, nhiều thiết bị ghi hình tối tân nhất cũng được trang bị để đảm bảo cho khâu hình ảnh chỉn chu nhất.','Đã một năm kể từ khi chú gấu Mic-Mic và chú thỏ Oscar trở lại sau cuộc phiêu lưu kỳ thú của họ. Và lần này, hai người bạn của chúng ta sẽ lại một lần nữa dính vào “phi vụ bất đắc dĩ” khi từ trên trời rơi xuống một bé gấu nâu Grizzly buộc họ phải thực hiện nhiệm vụ giao bé về cho bố mẹ một cách an toàn. Kế hoạch này bị kền kền quỷ quyệt Vulture quyết tâm phá hoại. Mic Mic, Oscar, cậu thiếu niên Panda và chú cò Stork sẽ cùng nhau di chuyển bằng khinh khí cầu để bắt đầu một cuộc phiêu lưu mới, trả lại Grizzly bé nhỏ cha mẹ của nó, cứu cuộc bầu cử ở Mỹ và cả lục địa khỏi ngọn núi lửa đang phun trào.','Guy là một chàng trai vụng về trong tình trường hay nói cách khác là “ế nhờ thực lực”. Cậu đem lòng yêu đơn phương June, một hot girl bậc nhất của trường, nổi tiếng với lời đồn là “tráp gơ” - thuật ngữ giới trẻ dùng để chỉ những cô gái thích chơi đùa tình cảm người khác. Tuy nhiên, Guy lại mặc kệ lời cảnh tỉnh mà rơi vào lưới tình của June, nhưng số phận trớ trêu đã cản bước họ đi đến một mối quan hệ yêu đương ra trò.   Trong khi Guy độc thân, June đang có bạn trai. Khi June vừa kết thúc mối quan hệ của mình, Guy lại đang “thử yêu” một cô gái khác. Khi Guy quyết định chia tay, June lại có bạn trai mới! Cứ thế, họ lựa chọn sẽ coi nhau như những người bạn mà không thể gặp nhau ở “giao điểm” tình yêu. Liệu sự quyết tâm “cuồng si” của Guy có đủ sức biến mối quan hệ này thành “đúng người, đúng thời điểm”?','Lấy bối cảnh Sài Gòn 1998, phim là tiền truyện của Hai Phượng kể về hành trình “hắc hóa” của nữ giang hồ Thanh Sói. Thanh Sói hé lộ câu chuyện về cuộc đời của Thanh Sói, qua những góc khuất chưa từng kể trong quá khứ để lý giải vì sao cô lại trở nên hung ác đến như vậy. Bộ phim hứa hẹn sẽ tạo nên những khoảnh khắc ấn tượng của thể loại phim hành động Việt Nam, đồng thời đáp ứng kỳ vọng của những khán giả từng yêu thích Hai Phượng với những màn hành động mãn nhãn, hoành tráng.','Chú mèo Puss giờ đây đã không thể ngạo nghễ chu du mà chẳng màng nguy hiểm như trước nữa, bởi cậu đã mất 8 trong 9 cuộc đời mà mình có. Và với tình hình này, việc đi tìm lại “điều ước cuối cùng” nhằm khôi phục lại các mạng sống trở nên khó khăn hơn bao giờ hết. Thật may cho cậu khi vẫn còn người bạn “lợi hại” sẵn sàng đồng hành – cô mèo Kitty, và một thành viên mới gia nhập, vô cùng “nhắng nhít” và nhiệt tình. Sau khi mất đi mạng sống thứ 8, Puss được bác sĩ thú y khuyên nhủ tới nhà Mama Luna – một bà lão “nghiện” mèo chính hiệu và luôn mở cửa chào đón những chú mèo cưng mới. Dù tâm hồn cự tuyệt nhưng với tình thế gian nan hiện tại, Puss vẫn quyết định tới đó. Tại đây, anh đã gặp Perro – một chú chó trị liệu nhưng “đội lốt” mèo. Tưởng chừng mọi chuyện sẽ êm thấm, nhưng kẻ mà Puss đã từng gây thù chuốc oán vẫn tìm đến tận nơi – cô bé tóc vàng cùng gia đình gấu. Cũng từ lúc này, Perro đã biết được chú mèo nhỏ nhắn chính là Mèo Đi Hia đầy lợi hại vô cùng đáng ngưỡng mộ. Dù tẩu thoát thành công khỏi nhà Mama Luna và tránh được hội “đầu gấu” một phen, Puss đã bị truy nã treo thưởng và bị kẻ săn tiền thưởng hiểm ác Sói Xám truy đuổi. Lúc này đây là một màn “mỹ nhân cứu anh hùng” tới từ cô nàng Kitty Scott Paws. Cùng với sự hỗ trợ của Perro, chuyến phiêu lưu của bộ ba liệu có thể toàn mạng hoàn thành ?'];
        $ngayphathanh = ['24/11/2022','02/12/2022','02/12/2022','10/12/2022','17/12/2022','30/12/2022','23/12/2022','24/12/2022'];
        $daodien = ['Nguyễn Chung','Tommy Wirkola','Bùi Thạc Chuyên','James Cameron','Vasiliy Rovenskiy','Thitipong Kerdtongtawee','Ngô Thanh Vân','Kasilass'];
        $nxs = ['DST Entertainment','87North','LTC Studio','20th Century Studios, TSG Entertainment','Licensing Brands','CJ HK Entertainment','Studio68','DreamWorks Animation'];
        $datnuoc = ['Việt Nam','Mỹ','Việt Nam','Mỹ','Nga','Việt Nam','Việt Nam','Mỹ'];
        $hinh = ['hanhphucmau.jpg','demhungtan.jpg','trotan.jpg','avata_water.png','bigtrip2.png','omg.png','thanhsoi.png','meo.jpg'];
        $dienvien = ['NSND Kim Xuân, Phạm Huỳnh Hữu Tài, Dược Sĩ Tiến','David Harbour, John Leguizamo, Cam Gigandet','Phương Anh Đào, Quang Tuấn, Hạnh Thúy','Sam Worthington, Zoe Saldana, Kate Winslet, Sigourney Weaver, Stephen Lang','Daniel Medvedev, Bernard Jacobsen, Stephen Thomas Ochsner','Wongravee Nateetorn, Plearnpichaya Komalarajun, Peach Pachara Chirathivat','Tóc Tiên, Đồng Ánh Quỳnh, Rima Thanh Vy, Ngô Thanh Vân, Thuận Nguyễn, Song Luân','Antonio Banderas, Salma Hayek, Florence Pugh, Olivia Colman'];
        $tgian = ['110','111','117','192','90','125'];
        // ,'109','103'
        $count_film = 0;
        foreach($tgian as $item){
            $count_film++;
        }
        for ($i=0; $i < $count_film; $i++) {
            $dataFilm[] =[	
                'filmname' => $ten[$i], 	
                'trailer' =>  	$trailer[$i],
                'description' => $mota[$i],	
                'start_day' => 	$ngayphathanh[$i],
                'director' => 	$daodien[$i],
                'NSX'	 => $nxs[$i],
                'country' => 	$datnuoc[$i],
                'image'	 => $hinh[$i],
                'castes' => 	$dienvien[$i],
                'time_film'	 => $tgian[$i],
                'created_at' => new \DateTime
            ];
        };
        DB::table('film')->insert($dataFilm);

        // Create data for Category_film table
        $film_id = ['1','1','2','2','3','3','3','4','4','4','5','5','6','6'];
        $cate_id = ['5','8','6','4','1','3','2','6','5','2','8','7','2','3','4','5','6','7'];        
        $dataadsa= [];
        $count_tl = 0;
        foreach($film_id as $item){
            $count_tl++;
        }
         for($i=0;$i<$count_tl;$i++){         
             $dataadsa[] =[
                 'film_id' => $film_id[$i],
                 'category_id' => $cate_id[$i],
                 'created_at' => new \DateTime
             ];
        }
        DB::table('category_film')->insert($dataadsa);


        // Create data for showtime table
        $showtime = [];
        $show_dateTime = ['2023-04-05','2023-04-06'];
        $show_Brand = ['1','2'];
        $show_Room = ['1','2','3','4','5','6'];
        $show_Room_2 = ['7','8','9','10','11','12'];
        $show_Film = ['1','2','3','4','5','6'];
        $show_Time = ['1','28','55','82','109'];
                
        for($c=0;$c<2;$c++){
            // $c = chi nhánh
            for($a=0;$a<2;$a++){
                // $a = show_dateTime
                for($j=0;$j<6;$j++){
                    // $j = Room ++ FilM
                    for($b=0;$b<5;$b++){
                        // $b = show_Time
                        $showtime[] = [ 
                            'date_time' => $show_dateTime[$a],
                            'brand_id' => $show_Brand[$c],
                            'room_id' => $c == 0 ? $show_Room[$j] : $show_Room_2[$j],	
                            'film_id' => $show_Film[$j],	
                            'time_id' => $show_Time[$b],	
                            'created_at' => new \DateTime
                        ];
                    }
                }
            }
        }
        DB::table('showtime')->insert($showtime);
        

        
    }
}

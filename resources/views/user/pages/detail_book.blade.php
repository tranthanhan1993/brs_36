@extends('user.master')
@section('content')
<div class="detail freework" >
    <div class="detailbook">
        <div class="khung1" >
            {{ Html::image('user/img/page3_pic1.jpg') }}
            <div class="inforbook" >
                <h2>Harry botter</h2>
                <a href="" >{{ trans('book.unlike') }}</a>
                {{ Html::image('user/img/like1.png') }}
                <div class="cclear"></div>
                <table>
                    <tr>
                        <td>{{ trans('book.author') }}:</td>
                        <td>Tokio takesi</td>
                    </tr>
                    <tr>
                        <td>{{ trans('book.category') }}:</td>
                        <td>Novel</td>
                    </tr>
                    <tr>
                        <td>{{ trans('book.public_day') }}:</td>
                        <td>11-12-2016</td>
                    </tr>
                    <tr>
                        <td>{{ trans('book.number_of_likes') }}: </td>
                        <td>45</td>
                    </tr>
                    <tr>
                        <td>{{ trans('book.rate') }}: </td>
                        <td>
                            {{ HTML::image('user/img/star.png','a picture', array('class' => 'star')) }}
                            {{ HTML::image('user/img/star.png','a picture', array('class' => 'star')) }}
                            {{ HTML::image('user/img/star.png','a picture', array('class' => 'star')) }}
                            {{ HTML::image('user/img/star.png','a picture', array('class' => 'star')) }}
                            {{ HTML::image('user/img/star.png','a picture', array('class' => 'star')) }}
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="check" style="margin-right: 5px;">{{ trans('book.mark_book_as_reading') }} </td>
                        <td><input type="radio" name="check" style="margin-right: 5px;">{{ trans('book.mark_book_as_readed') }}</td>
                    </tr>
                </table>

            </div>
        </div>
        <h2> {{ trans('book.content') }}</h2>
        <div class="khung2">
        Bắt trẻ đồng xanh (tiếng Anh: The Catcher in the Rye) là tiểu thuyết đầu tay của nhà văn Mỹ J. D. Salinger. Tác phẩm dùng cách tường thuật ở ngôi thứ nhất, cũng là nhân vật chính của truyện, Holden Caulfield, kể lại câu chuyện của Holden trong những ngày cậu ở thành phố New York sau khi bị đuổi khỏi Pencey Prep, một trường dự bị đại học.

Xuất bản lần đầu tiên tại Hoa Kỳ năm 1951, tác phẩm này đã gây ra tranh cãi lớn vì đã sử dụng nhiều ngôn từ tục tĩu, mô tả tâm lý chán chường và vấn đề tình dục của vị thành niên[1][2]. Nhân vật chính của Bắt trẻ đồng xanh, Holden Caulfield, đã trở thành hình tượng cho sự nổi loạn và thách thức của thanh thiếu niên Mỹ[3].

Trong lần xuất bản đầu tiên, Bắt trẻ đồng xanh chủ yếu dành cho độc giả là người lớn[4] nhưng sau đó cuốn tiểu thuyết đã được đưa vào chương trình giảng dạy bậc trung học của nhiều nước nói tiếng Anh và cũng được dịch sang hầu hết các ngôn ngữ chính trên thế giới[5]. Mỗi năm có trung bình khoảng 250.000 bản sách của tác phẩm được bán ra, tính tổng cộng đến nay là khoảng 65 triệu ấn bản[6]. Tác phẩm này đã được tạp chí Time đưa vào danh sách 100 tiểu thuyết tiếng Anh hay nhất từ năm 1923 đến nay[7].

Mục lục  [ẩn]
1   Nhân vật
2   Tóm tắt tác phẩm
3   Tranh cãi
4   Bản dịch tiếng Việt
5   Tham khảo
6   Liên kết ngoài
7   Xem thêm
Nhân vật[sửa | sửa mã nguồn]
Holden Caulfield là nhân vật chính và cũng là người kể chuyện. Khi câu chuyện của Bắt trẻ đồng xanh diễn ra Holden 17 tuổi và vừa bị đuổi khỏi trường dự bị đại học Pencey Prep. Cậu là một chàng thanh niên thông minh và nhạy cảm. Xã hội qua lối kể cay độc pha giễu cợt của Holden là tràn ngập những điều xấu xa, những người đạo đức giả và khiến cậu không thể chịu đựng nổi.

Allie Caulfield là cậu em trai của Holden đã chết vì bệnh máu trắng khi Holden 13 tuổi. Allie là một cậu bé thông minh, sống tình cảm và rất quan tâm tới người khác. Cậu và Holden rất thân thiết với nhau, khi Allie qua đời, Holden đã dùng tay không đập vỡ hết cửa sổ của gara ô tô trong nhà. Bị thương nặng ở tay phải, Holden từ đó trở đi không thể nắm chặt bàn tay phải như bình thường. Cậu thường tưởng nhớ tới em trai thông qua chiếc găng tay trên đó có bài thơ mà Allie ghi tặng.

Phoebe Caulfield là em gái yêu quý của Holden. Cô bé học lớp 4 và theo Holden thì là một cô bé cực kì ngây thơ và dễ mến. Tuy vậy đôi khi cô bé vẫn tỏ ra người lớn hơn anh trai khi chỉ trích tính khí trẻ con của Holden.

D.B. Caulfield là anh trai của Holden, một nhà biên kịch sống ở Hollywood.

Tóm tắt tác phẩm[sửa | sửa mã nguồn]
Câu chuyện của Bắt trẻ đồng xanh xảy ra trong vài ngày từ sau khi kết thúc kì học mùa thu đến dịp Giáng sinh, bắt đầu vào một ngày thứ Bảy sau khi kết thúc kì học tại trường dự bị đại học Pencey Prep ở Agerstown, Pennsylvania. Pencey là trường học thứ tư của Holden sau khi cậu ba lần bị đuổi học. Tại Pencey, Holden tiếp tục trượt 4 trên 5 môn học và được thông báo sẽ bị đuổi học. Trước khi quay về nhà ở khu Manhattan vào thứ Tư tuần tiếp theo, cậu đến thăm ông Spencer, thầy giáo dạy Lịch sử, để chào tạm biệt người thầy duy nhất cậu thấy yêu quý trong thời gian học ở Pencey, tuy vậy ông Spencer lại khiển trách kết quả học tập của Holden và làm cậu thấy khó chịu. Quay trở về kí túc xá, Holden tiếp tục bị cậu bạn bẩn thỉu phòng bên là Ackley và bạn cùng phòng Stradlater quấy rầy. Stradlater vừa đi chơi với Jane Gallagher, một cô gái Holden có cảm tình. Trong khi kể lại cuộc hẹn với Jane, Stradlater và Holden bắt đầu to tiếng và đánh nhau, Holden bị Stradlater quật xuống sàn và đấm chảy máu mũi. Chán ngấy với tất cả những thứ liên quan đến trường Pencey, Holden thu dọn đồ đạc và rời đi luôn chứ không chờ đến thứ Tư.

Trên đường tới New York, Holden gặp mẹ của một trong các người bạn học ở Pencey. Mặc dù nghĩ cậu bạn học là một thằng "khốn nạn", Holden vẫn cố tô vẽ hình ảnh tốt đẹp của bạn mình cho người mẹ. Khi tới ga Penn, Holden ra buồng điện thoại định gọi cho vài người nhưng cuối cùng lại không gọi cho ai cả mà lên chiếc taxi của viên tài xế Horwitz. Trên xe cậu hỏi Horwitz những câu làm ông này khó chịu như việc lũ vịt ở công viên Trung tâm sẽ đi đâu nếu những cái hồ ở đây đóng băng. Cuối cùng chiếc taxi dừng lại ở khách sạn Edmont Hotel, Holden đặt phòng và gọi cho Faith Cavendish, một vũ công khỏa thân, để đề nghị cô này bán dâm cho cậu tại khách sạn, Faith đề nghị dời cuộc hẹn đến hôm sau nhưng Holden không đồng ý, cậu rời khách sạn. Bắt một chiếc taxi tới câu lạc bộ nhạc Jazz ở Greenwich Village, Holden lại tiếp tục hỏi về chỗ ở của những con vịt trong mùa đông. Ngồi trong câu lạc bộ không lâu, cậu lại quay trở về Edmont và sau lời gợi ý của người phụ trách thang máy, cậu nhờ gã này gọi hộ một cô gái bán dâm lên phòng. Khi cô gái bán dâm "Sunny" lên đến nơi, Holden lại cố gắng bắt chuyện và thừa nhận là mình không muốn quan hệ. Kết quả là Sunny buộc cậu phải trả đủ tiền cùng với sự đe dọa của Maurice, tay phụ trách thang máy, hai người lấy được của Holden 5 dollar sau khi Marice thoi cho Holden vài cú đấm vào bụng.

Sáng hôm sau Holden gọi điện cho Sally Hayes, bạn gái cũ của cậu và rủ cô này cùng đi xem kịch. Hai người sau đó lại đi trượt băng ở Đài phát thanh thành phố, Holden lại nổi khùng và làm Sally bỏ đi. Gặp một người bạn cũ và uống rượu say, Holden nổi hứng ra công viên Trung tâm xem lũ vịt trước khi lẻn về nhà để gặp em gái Phoebe rồi đến nhà thầy giáo tiếng Anh cũ là ông Antolini. Holden ngủ lại tại nhà ông Antolini nhưng bất chợt tỉnh giấc khi ông vuốt đầu cậu. Tưởng ông giáo định có hành động xàm xỡ, Holden bỏ đi và ngủ lại tại Ga Trung tâm.

Ngày tiếp theo Holden đến trường của Phoebe để hẹn gặp cô bé, thông báo rằng cậu quyết định bỏ nhà. Khi Phoebe đến chỗ hẹn, cô bé mang cả hành lí với ý định sẽ đi cùng anh trai. Holden giận dữ từ chối làm Phoebe dỗi, cậu phải làm lành bằng cách dẫn cô bé đi chơi. Câu chuyện kết thúc bằng cảnh Holden nhìn em gái vui đùa, cậu không muốn kể tiếp việc mình đã về nhà và ốm ra sao, hay ngôi trường thứ năm của cậu là ngôi trường nào.

Tranh cãi[sửa | sửa mã nguồn]
Năm 1960, một giáo viên đã bị sa thải, sau đó được phục chức, vì đã giới thiệu Bắt trẻ đồng xanh trên lớp[8]. Trong khoảng thời gian từ 1961 đến 1982, tiểu thuyết này là tác phẩm bị kiểm duyệt cắt bỏ nhiều nhất trong hệ thống các trường trung học và thư viện của Hoa Kỳ[9]. Tuy vậy, năm 1981, Bắt trẻ đồng xanh lại là tác phẩm được giảng dạy nhiều thứ hai trong các trường học công ở Mỹ[10].

Khi bị bắt ngay sau vụ ám sát John Lennon, Mark David Chapman đang mang theo người một cuốn Bắt trẻ đồng xanh và hắn cũng nhắc tới tác phẩm này trong quá trình hỏi cung của cảnh sát[11]. John Hinckley, Jr., người ám sát bất thành tổng thống Ronald Reagan năm 1981, cũng được ghi nhận là bị ám ảnh bởi Bắt trẻ đồng xanh[12].
        </div>
        <h2 class="wri_review">{{ trans('book.write_review') }}</h2>
        <fieldset class="fs_review">
            <div>
                {{ HTML::image('user/img/page3_pic2.jpg','a picture', array('class' => 'imgreview')) }}
                <div>
                    <a class="ava_cmt">Hoang Minh</a> sadasdsa
                </div>
                <div >
                    <a href="" class="like_a_cm">{{ trans('book.like') }}</a>
                    <a href="" class="like_a_cm">{{ trans('book.comment') }}</a>
                    <p class="p_date">17 November at 10:50</p>
                </div>
                <div class="cclear"></div>
                <div class="show_cmt">
                    {{ HTML::image('user/img/page3_pic4.jpg','a picture', array('class' => 'img_cmt')) }}
                    <div>
                        <a href="" class="show_name">Hoang Minh</a> sadasdsa
                    </div>
                    <div class="ava_cmt1">
                        <a class="like_cmt">{{ trans('book.like') }}</a>
                        <p class="p_date_cmt">17 November at 10:50</p>
                    </div>
                    <div class="cclear"></div>

                    {{ HTML::image('user/img/page3_pic3.jpg','a picture', array('class' => 'img_cmt')) }}
                    <div>
                        <a href="" class="show_name">Hoang Minh</a> sadasdsa
                    </div>
                    <div class="ava_cmt1">
                        <a class="like_cmt">{{ trans('book.like') }}</a>
                        <p class="p_date_cmt">17 November at 10:50</p>
                    </div>

                    <div class="cclear"></div>

                    {{ HTML::image('user/img/page3_pic1.jpg','a picture', array('class' => 'img_cmt')) }}
                    <input type="text" name="" class="input_cmt" placeholder="{{ trans('book.write_comment_here') }}...">
                </div>
            </div>

            <div class="clear_mer"></div>
            <div>
                {{ HTML::image('user/img/page3_pic2.jpg','a picture', array('class' => 'imgreview')) }}
                <div>
                    <a class="ava_cmt">Hoang Minh</a> sadasdsa
                </div>
                <div >
                    <a href="" class="like_a_cm">{{ trans('book.like') }}</a>
                    <a href="" class="like_a_cm">{{ trans('book.comment') }}</a>
                    <p class="p_date">17 November at 10:50</p>
                </div>
                <div class="cclear"></div>
                <div class="show_cmt">
                    {{ HTML::image('user/img/page3_pic4.jpg','a picture', array('class' => 'img_cmt')) }}
                    <div>
                        <a href="" class="show_name">Hoang Minh</a> sadasdsa
                    </div>
                    <div class="ava_cmt1">
                        <a class="like_cmt">{{ trans('book.like') }}</a>
                        <p class="p_date_cmt">17 November at 10:50</p>
                    </div>
                    <div class="cclear"></div>
                    {{ HTML::image('user/img/page3_pic3.jpg','a picture', array('class' => 'img_cmt')) }}
                    <div>
                        <a href="" class="show_name">Hoang Minh</a> sadasdsa
                    </div>
                    <div class="ava_cmt1">
                        <a class="like_cmt">{{ trans('book.like') }}</a>
                        <p class="p_date_cmt">17 November at 10:50</p>
                    </div>
                    <div class="cclear"></div>
                    {{ HTML::image('user/img/page3_pic1.jpg','a picture', array('class' => 'img_cmt')) }}
                    <input type="text" name="" class="input_cmt" placeholder="{{ trans('book.write_comment_here') }}...">
                </div>
            </div>
            <div class="clear_mer"></div>

            <div>
                {{ HTML::image('user/img/page3_pic3.jpg','a picture', array('class' => 'imgreview')) }}
                <input type="text" name="" class="input_review" placeholder="{{ trans('book.write_request_here') }}...">
            </div>
        </fieldset>
    </div>
</div>
@endsection
@section('content1')
<div class="detail timeacti">
    @include('user.blocks.time_follow')
</div>
@endsection

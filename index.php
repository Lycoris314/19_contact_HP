<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>〇〇〇〇〇〇</title>

    <link rel="stylesheet" href="./index.css" media="screen and (min-width:769px)">
    <link rel="stylesheet" href="./responsive.css" media="screen and (max-width:768px)">

    <script src="./jquery.js"></script>
    <script src="./index.js"></script>

</head>

<body>
    <header>
        <h1 class=center>〇〇〇〇〇〇</h1>
        <div>
            <p>営業時間：11:00～21:00</p>
            <p>TEL：〇〇〇–〇〇〇–〇〇〇〇</p>
        </div>
    </header>

    <div class="anime">
        <div class="blue"></div>
        <div class="green center">
            <p>WELCOME</p>
        </div>
        <img src="./img/back-image.jpg" alt="ピザ" class=back_img>
    </div>

    <main>

        <section class="sec1">
            <h2>メニュー</h2>
            <article class="pasta">
                <h3>パスタ</h3>
                <div class=center>
                    <img src="./img/pasta.jpg" alt="パスタ">
                </div>
                <ul>
                    <li>
                        <p>カルボナーラ</p>
                        <p>800円</p>
                    </li>
                    <li>
                        <p>ペペロンチーノ</p>
                        <p>750円</p>
                    </li>
                    <li>
                        <p>和風明太子パスタ</p>
                        <p>860円</p>
                    </li>
                    <li>
                        <p>イカスミパスタ</p>
                        <p>820円</p>
                    </li>
                    <li>
                        <p>ジェノベーゼ</p>
                        <p>850円</p>
                    </li>
                </ul>
            </article>

            <article class="pizza">
                <h3>ピザ</h3>
                <div class=center>
                    <img src="./img/pizza.jpg" alt="ピザ">
                </div>
                <ul>
                    <li>
                        <p>マルゲリータ</p>
                        <p>1200円</p>
                    </li>
                    <li>
                        <p>シーフードピザ</p>
                        <p>1300円</p>
                    </li>
                    <li>
                        <p>ジェノベーゼピザ</p>
                        <p>1300円</p>
                    </li>
                    <li>
                        <p>マスカルポーネピザ</p>
                        <p>1400円</p>
                    </li>
                </ul>
            </article>
        </section>

        <section class="sec2">
            <div class="access">
                <h2>アクセス</h2>
                <p>〇〇駅から西口から徒歩7分</p>
                <div class=center>
                    <img src="./img/map.jpg" alt="店への地図">
                </div>
            </div>

            <div class="contact">
                <h2>お問い合わせはこちらから</h2>
                <button id="to_form">お問い合わせフォーム</button>
            </div>
        </section>

    </main>

    <footer>
        <p>〇〇〇〇〇〇</p>
    </footer>


    <dialog id="form">
        <h3>お問い合わせフォーム</h3>
        <div>
            <form action="./system/system.php" method="post">
                <table>
                    <tbody>
                        <tr>
                            <td>お名前</td>
                            <td class="name">
                                氏：<input name="last_name" required>
                                名：<input name="first_name" required>
                            </td>
                        </tr>
                        <tr>
                            <td>フリガナ</td>
                            <td class="name">
                                氏：<input name="last_name_kana" required>
                                名：<input name="first_name_kana" required>
                            </td>
                        </tr>
                        <tr>
                            <td>住所</td>
                            <td class="address">
                                <p>〒<input name="address_num1" pattern="\d{3}" required> –
                                    <input name="address_num2" pattern="\d{4}" required>
                                </p>
                                <input name="address" required>
                            </td>
                        </tr>
                        <tr>
                            <td>電話番号</td>
                            <td class="tel">
                                <input type="tel" name="tel_num1" pattern="\d{1,}" required> –
                                <input type="tel" name="tel_num2" pattern="\d{1,}" required> –
                                <input type="tel" name="tel_num3" pattern="\d{1,}" required>
                            </td>
                        </tr>
                        <tr>
                            <td>メールアドレス</td>
                            <td class="mail"><input id="mail" type="email" name="mail" required></td>
                        </tr>
                        <tr>
                            <td>メールアドレス<br>(確認用)</td>
                            <td class="mail"><input id="mail2" type="email" required></td>
                        </tr>
                        <tr>
                            <td>質問内容</td>
                            <td><textarea name="content" cols="30" rows="10" maxlength=500 required></textarea></td>
                        </tr>
                    </tbody>
                </table>

                <div class="btns">
                    <button id="submit_btn">送信</button>
                    <button type="button" id="close_btn">閉じる✕</button>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="submitted">
        <div>
            <p>質問を受付けました</p>
            <button type="button" id="close_btn2">閉じる✕</button>
        </div>
    </dialog>

    <div class=backdrop></div>
</body>

</html>
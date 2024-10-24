<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
</head>

<body>
    <div class="container">
        <header>
            <h1 class="left">お問い合わせフォーム</h1>
        </header>
        <main>
            <p class="left">こちらは○○に関するお問い合わせフォームです。</p>

            <form name="contactForm" action="kakunin.php" method="POST">
                <table>
                    <tr>
                        <th class="hissu"><label>氏名</label></th>
                        <td><input type="text" name="name" placeholder="山田 太郎" required></td>
                    </tr>
                    <tr>
                        <th class="hissu"><label>メールアドレス</label></th>
                        <td><input type="email" name="mail" placeholder="mail@example.com" required></td>
                    </tr>
                    <tr>
                        <th class="hissu"><label>サービス</label></th>
                        <td>
                            <select id="service" name="service" onchange="updateOptions()" required>
                                <option value="service1">レンタルサーバー</option>
                                <option value="service2">sample2</option>
                                <option value="service3">sample3</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="hissu"><label>カテゴリー</label></th>
                        <td>
                            <div id="radios">
                                <div class="radio-group" id="group1">
                                    <label><input type="radio" name="options" value="radio1-1" required> ラジオボタン1-1</label><br />
                                    <label><input type="radio" name="options" value="radio1-2" required> ラジオボタン1-2</label><br />
                                    <label><input type="radio" name="options" value="radio1-3" required> ラジオボタン1-3</label>
                                </div>
                                <div class="radio-group hidden" id="group2">
                                    <label><input type="radio" name="options" value="radio2-1" required> ラジオボタン2-1</label><br />
                                    <label><input type="radio" name="options" value="radio2-2" required> ラジオボタン2-2</label><br />
                                    <label><input type="radio" name="options" value="radio2-3" required> ラジオボタン2-3</label>
                                </div>
                                <div class="radio-group hidden" id="group3">
                                    <label><input type="radio" name="options" value="radio3-1" required> ラジオボタン3-1</label><br />
                                    <label><input type="radio" name="options" value="radio3-2" required> ラジオボタン3-2</label><br />
                                    <label><input type="radio" name="options" value="radio3-3" required> ラジオボタン3-3</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th><label>プラン</label></th>
                        <td>
                            <div class="checkbox-group" id="plan1">
                                <label><input type="checkbox" name="plan[]" value="プラン1-1"> プラン1-1</label><br />
                                <label><input type="checkbox" name="plan[]" value="プラン1-2"> プラン1-2</label><br />
                                <label><input type="checkbox" name="plan[]" value="プラン1-3"> プラン1-3</label>
                            </div>
                            <div class="checkbox-group hidden" id="plan2">
                                <label><input type="checkbox" name="plan[]" value="プラン2-1"> プラン2-1</label><br />
                                <label><input type="checkbox" name="plan[]" value="プラン2-2"> プラン2-2</label><br />
                                <label><input type="checkbox" name="plan[]" value="プラン2-3"> プラン2-3</label>
                            </div>
                            <div class="checkbox-group hidden" id="plan3">
                                <label><input type="checkbox" name="plan[]" value="プラン3-1"> プラン3-1</label><br />
                                <label><input type="checkbox" name="plan[]" value="プラン3-2"> プラン3-2</label><br />
                                <label><input type="checkbox" name="plan[]" value="プラン3-3"> プラン3-3</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="hissu"><label>お問い合わせ内容</label></th>
                        <td><textarea name="naiyo" placeholder="お問い合わせ内容をご記入ください。(100字以内で入力してください。)" required maxlength="100"></textarea></td>
                    </tr>
                </table>
                <input class="btn-blue" type="submit" name="submit1" value="確認画面に進む">
            </form>
        </main>
    </div>

    <script src="form.js"></script>
</body>

</html>
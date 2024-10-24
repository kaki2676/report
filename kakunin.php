<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>お問い合わせフォーム</h1>
        </header>
        <main>
            <div>こちらは○○に関するお問い合わせフォームです。</div>
            <form id="contactForm" method="post">
                <table>
                    <tr>
                        <th><label>氏名</label></th>
                        <td>
                            <p><?php echo htmlspecialchars($_POST['name']); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>メールアドレス</label></th>
                        <td>
                            <p><?php echo htmlspecialchars($_POST['mail']); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>サービス</label></th>
                        <td>
                            <p><?php echo htmlspecialchars($_POST['service']); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>カテゴリー</label></th>
                        <td>
                            <p><?php echo htmlspecialchars($_POST['options']); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>プラン</label></th>
                        <td>
                            <p><?php echo isset($_POST['plan']) ? implode("、", array_map('htmlspecialchars', $_POST['plan'])) : '選択なし'; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>お問い合わせ内容</label></th>
                        <td>
                            <p><?php echo htmlspecialchars($_POST['naiyo']); ?></p>
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                <input type="hidden" name="mail" value="<?php echo htmlspecialchars($_POST['mail']); ?>">
                <input type="hidden" name="service" value="<?php echo htmlspecialchars($_POST['service']); ?>">
                <input type="hidden" name="options" value="<?php echo htmlspecialchars($_POST['options']); ?>">
                <input type="hidden" name="plan" value="<?php echo isset($_POST['plan']) ? implode(",", array_map('htmlspecialchars', $_POST['plan'])) : ''; ?>">
                <input type="hidden" name="naiyo" value="<?php echo htmlspecialchars($_POST['naiyo']); ?>">

                <input type="button" class="btn" name="button" onclick="history.back();" value="入力画面に戻る">
                <input type="submit" class="btn-blue" name="submit2" value="送信する">
            </form>
        </main>
    </div>
    <script src="check.js"></script>
</body>

</html>
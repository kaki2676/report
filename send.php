<?php

header("Content-Type: application/json; charset=utf-8"); // JSON形式でレスポンスを返す

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $to = htmlspecialchars($_POST['mail']); // 送信先のメールアドレス
  $subject = '2024夏期インターン メインプログラム（野尻）';
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['mail']);
  $service = htmlspecialchars($_POST['service']);
  $options = htmlspecialchars($_POST['options']);
  $plan = htmlspecialchars($_POST['plan']);
  $naiyo = htmlspecialchars($_POST['naiyo']);

  $message = "氏名: " . $name . "\n" .
    "メールアドレス: " . $email . "\n" .
    "サービス: " . $service . "\n" .
    "カテゴリー: " . $options . "\n" .
    "プラン: " . $plan . "\n" .
    "お問い合わせ内容: " . $naiyo . "\n";

  // メールを送信
  // var_dump(mb_send_mail($to, $subject, $message));

  try {
    $headers = "From: " . $email . "\r\n"; // 送信者のメールアドレス
    $headers .= "Reply-To: " . $email . "\r\n"; // 返信先を送信者に設定
    $headers .= "X-Mailer: PHP/" . phpversion(); // メーラー情報を追加

    // メールを送信
    $result = mb_send_mail($to, $subject, $message, $headers);

    // $result = true;
    if (!$result) {
      throw new Exception('メールの送信に失敗しました');
    }
    echo json_encode(['status' => 'success']);
  } catch (Exception $e) {
    echo json_encode([
      'status' => $e->getMessage()
    ]);
  }

  exit;
}

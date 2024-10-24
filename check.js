async function sendData(formData) {
    const url = "send.php";
    try {
        const response = await fetch(url, {
            mode: 'cors',
            method: 'POST',
            body: formData,
        });

        // レスポンスが成功ステータスでなければエラーをスロー
        if (!response.ok) {
            throw new Error(`レスポンスステータス1: ${response.status}`);
        }

        // レスポンスデータをjsonとして解析
        const data = await response.json();
        
        // サーバーからの応答に基づいて判定
        if (data.status !== 'success') {
            throw new Error(`レスポンスステータス2: ${data.status}`);
        }

        console.log("送信成功");
        alert("メールが送信されました！"); // 送信成功メッセージ
        window.location.href = "kanryo.php";
    } catch (error) {
        console.error(`エラーが発生しました: ${error.message}`);
        alert("メールの送信に失敗しました。"); // エラーメッセージ
    }
}


document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault(); // デフォルトのフォーム送信を防ぐ
    const formData = new FormData(this); // フォームデータを取得
    sendData(formData); // sendData関数を呼び出す
});

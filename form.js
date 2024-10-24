function updateOptions() {
    var selectedValue = document.getElementById('service').value;
    var radioGroups = document.querySelectorAll('.radio-group');
    var checkboxGroups = document.querySelectorAll('.checkbox-group');

    // Hide all radio groups and clear their values
    radioGroups.forEach(function (group) {
        var radios = group.querySelectorAll('input[type="radio"]');
        radios.forEach(function (radio) {
            radio.checked = false;
        });
        group.classList.add('hidden');
    });

    // Hide all checkbox groups and clear their values
    checkboxGroups.forEach(function (group) {
        var checkboxes = group.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = false;
        });
        group.classList.add('hidden');
    });

    // Show the selected radio and checkbox group
    if (selectedValue === 'service1') {
        document.getElementById('group1').classList.remove('hidden');
        document.getElementById('plan1').classList.remove('hidden');
    } else if (selectedValue === 'service2') {
        document.getElementById('group2').classList.remove('hidden');
        document.getElementById('plan2').classList.remove('hidden');
    } else if (selectedValue === 'service3') {
        document.getElementById('group3').classList.remove('hidden');
        document.getElementById('plan3').classList.remove('hidden');
    }
}

document.addEventListener('DOMContentLoaded', function () {
    updateOptions();
});

document.getElementById('contactForm').addEventListener('submit', function(event) {
    var isValid = true;
    var errorMessage = '';

    // 氏名のバリデーション
    var nameField = document.querySelector('input[name="name"]');
    var name = nameField.value.trim();
    if (name === '') {
        isValid = false;
        errorMessage += '氏名を入力してください。\n';
        nameField.setCustomValidity('氏名を入力してください。');
    } else {
        nameField.setCustomValidity('');
    }

    // メールアドレスのバリデーション
    var mailField = document.querySelector('input[name="mail"]');
    var mail = mailField.value.trim();
    if (mail === '') {
        isValid = false;
        errorMessage += 'メールアドレスを入力してください。\n';
        mailField.setCustomValidity('メールアドレスを入力してください。');
    } else if (!validateEmail(mail)) {
        isValid = false;
        errorMessage += '有効なメールアドレスを入力してください。\n';
        mailField.setCustomValidity('有効なメールアドレスを入力してください。');
    } else {
        mailField.setCustomValidity('');
    }

    if (!isValid) {
        alert(errorMessage);
        event.preventDefault(); // フォームの送信をキャンセル
    }
});

function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function disableButton(form) {
    const submitButton = form.querySelector('input[type="submit"]');
    submitButton.disabled = true; // ボタンを無効化
    submitButton.value = "送信中..."; // ボタンのテキストを変更
}
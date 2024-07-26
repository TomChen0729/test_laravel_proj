<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>JavaEducation - 劇情</title>
    <link rel="stylesheet" href="{{ asset('css/drama.css') }}">
</head>


<body>
    <p id='cid' style="display: none;">{{ $currentCountry }}</p>
    <div class="container" id="click-area">
        <div class="header">
            <h3>綠野仙蹤－蠻金之國篇</h3>
        </div>

        <div class="chat-container" id="chat-container">
            <div id="chat-log"></div>
        </div>

        <div class="footer">
            <p>請點擊空白處</p>
            <div>
                <button class="skip"><a href="{{ route('country.index', ['country_id' => $currentCountry]) }}">跳過劇情</a></button>
            </div>
        </div>
    </div>

    <!--js-->
    <script>
        const chatLog = document.getElementById('chat-log'),
            clickArea = document.getElementById('click-area'),
            chatContainer = document.getElementById('chat-container');

        var dialogues = @json($dramas);
        console.log(dialogues);

        let currentDialogueIndex = 0;
        var c_id = parseInt(document.getElementById('cid').textContent);
        
        console.log(c_id);
        clickArea.addEventListener('click', displayNextMessage);

        function displayNextMessage() {
            if (currentDialogueIndex < dialogues.length) {
                const { sender, message } = dialogues[currentDialogueIndex];
                appendMessage(sender, message);
                currentDialogueIndex++;
            } else {
                window.location.href = `/country/${c_id}`; // 結束後跳轉過去country.index，這是他的路徑
            }
        }

        function appendMessage(sender, message) {
            const messageElement = document.createElement('div');
            const iconElement = document.createElement('div');
            const chatElement = document.createElement('div');

            chatElement.classList.add('chat-box');
            iconElement.classList.add('icon');
            messageElement.classList.add(sender);
            messageElement.innerText = message;

            // 根據誰傳送訊息，機器人或user增加icon
            switch (sender) {
                case 'tls':
                    iconElement.style.backgroundImage = 'url("/images/drama/tls.svg")';
                    break;
                case 'scarecrow':
                    iconElement.style.backgroundImage = 'url("/images/drama/scarecrow.svg")';
                    break;
                case 'narration':
                    iconElement.style.backgroundImage = 'url("/images/drama/narration.svg")';
                    break;
                case 'badwitch':
                    iconElement.style.backgroundImage = 'url("/images/drama/badwitch.svg")';
                    break;
                case 'goodwitch':
                    iconElement.style.backgroundImage = 'url("/images/drama/goodwitch.svg")';
                    break;
            }

            chatElement.appendChild(iconElement);
            chatElement.appendChild(messageElement);
            chatLog.appendChild(chatElement);
            
            // 確保頁面滾動到最新消息
            setTimeout(() => {
                chatContainer.scrollTop = chatContainer.scrollHeight;
            });
        }

        // 初始化顯示第一句對話
        displayNextMessage();

        // function skipdrama(){
        //     window.location.href = `/country/${c_id}`;
        // }
    </script>
</body>

</html>

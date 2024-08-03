<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>寶箱解鎖</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/clike/clike.min.js"></script>
    <style>
        .container {
            display: block;
        }

        .question-container {
            border: 1px solid black;
            margin-bottom: 40px;
            padding: 10px;
        }

        .coding-container {
            width: 700px;
            height: 500px;
            margin: 0 auto;
            margin-bottom: 100px;
            border: 1px solid black;
        }

        .CodeMirror {
            height: 100%;
        }

        .submit-btn {
            border-radius: 1px solid black;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="question-container">
            <h1 class="question">主題：for迴圈</h1>
            <h2 class="question">題目：將寶箱的鑰匙孔解鎖，以繼續冒險</h2>
            <h3 class="hint">需求：利用萬用字元"*"印出層數為5的正三角形，每一行的星星數量必須比前一行多2個</h3>
        </div>
        <div class="coding-container">
            <textarea id="code-editor" name="code-editor">
public class hello {
    public static void main(String[] args) {
        int n = 5;
        // 程式撰寫區域

        // 控制層數
        for(){
            // 控制縮排(使星星在正確位置)
            for(){

            }
            // 印出相應數量的星星
            for(){
                
            }
        }
    }
}</textarea>

            <button id="send-code" class="submit-btn">提交</button>
        </div>
    </div>
    <button><a href="{{ route('home') }}">回第一頁</a></button>

    <!-- JavaScript -->
    <script>
        var editor = CodeMirror.fromTextArea(document.getElementById("code-editor"), {
            lineNumbers: true,
            mode: "text/x-java",
            theme: "default"
        });

        function removeComments(code) {
            return code.replace(/\/\/.*/g, '').trim();
        }

        var submitBtn = document.getElementById('send-code');

        submitBtn.addEventListener('click', () => {
            var userCode = editor.getValue();
            var codeBlock = `
        // 控制層數
        for(){
            // 控制縮排(使星星在正確位置)
            for(){

            }
            // 印出相應數量的星星
            for(){
                
            }
        }`;

            var startIdx = userCode.indexOf(codeBlock);
            if (startIdx !== -1) {
                var endIdx = startIdx + codeBlock.length;
                var extractedCode = userCode.substring(startIdx, endIdx);
                var cleanedCode = removeComments(extractedCode);

                alert('您輸入的code為：\n' + cleanedCode);
                // 將程式碼送入演算法，或是後端的判斷，如果success，顯現相應的效果，並執行通關
            } else {
                alert('未找到目標程式碼區塊，請確認您的輸入。');
            }
        });
    </script>
</body>

</html>

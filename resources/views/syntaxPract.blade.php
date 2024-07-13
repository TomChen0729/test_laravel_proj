<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>syntaxPract</title>
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
            <h1 class="quesiton">主題：if..else-if...else...</h1>
            <h2 class="quesiton">題目：已知的兩個變數(a、b)中，當我 a > b 的時候，進行加法，反之則減法</h2>
            <h3 class="hint">提示：if..else...</h3>
        </div>
        <div class="coding-container">
            <textarea id="code-editor" name="code-editor">
public class hello {
    public static void main(String[] args) {
        int a = 10;
        int b = 20;
        // 判斷式撰寫區域
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



        var submitBtn = document.getElementById('send-code');

        submitBtn.addEventListener('click', () => {
            var userCode = editor.getValue().split('// 判斷式撰寫區域');
            console.log(userCode);
            sendCode = userCode[1].replace('\n    }\n}', '').trim();
            if (sendCode != '') {
                alert('您輸入的code為：\n' + sendCode);
                // 將程式碼送入演算法，或是後端的判斷，如果success，顯現相應的效果，並執行通關
            } else {
                alert('打打字阿傻逼');
            }
        });
    </script>
</body>

</html>
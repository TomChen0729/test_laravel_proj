<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/theme/base16-dark.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/clike/clike.min.js"></script>

    <style>
        .question {
            width: 100%;
            height: 100px;
            background-color: #FFFDD3;
            border-radius: 20px;
            padding: 20px;
            text-align: center;
        }
        .question p {
            font-size: 20px;
            font-weight:bold;
        }
        .textarea-container {
            width: 100%;
            height: 100%;
            padding: 10px;
            display: flex;
            align-items: center;
        }
        textarea {
            width: 100%;
            height: 100%;
            font-size: 16px;
        }
        .CodeMirror{
            width: 100%;
            height:600px;
            border: 2px solid #ccc;
            border-radius: 10px;
            margin-top:-40px;
        }
        .CodeMirror-scroll {
            overflow: auto;
        }
        .btn-container{
            display:flex;
            justify-content:center;
            align-items: center;
        }
        .btn-container button{
            font-size:18px;
            margin:20px;
            margin-top:0px;
            border-radius:5px;
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 left-container">
                <div class="question">
                    <p>要打開寶箱，必須產製一個特殊鑰匙<br>鑰匙的形狀可以設為變數，用亂數產生1</p>
                </div>
            </div>
            <div class="col-md-6 right-container">
                <div class="textarea-container">
                    <textarea id="code-editor">
public class StarPatterns {
    public static void main(String[] args) {
        int n = 3;
        
        // 判斷式撰寫區域
    }
}
                    </textarea>
                </div>
                <div class="btn-container">
                    <button id="send-code" class="btn-submit">提交</button>
                    <button><a href="{{ route('home') }}">回第一頁</a></button>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript -->
    <script>
        var editor = CodeMirror.fromTextArea(document.getElementById("code-editor"), {
            lineNumbers: true,
            mode: "text/x-java",
            theme: "base16-dark"
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

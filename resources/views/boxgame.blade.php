<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>boxgame</title>
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
            font-weight: bold;
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

        .CodeMirror {
            width: 100%;
            height: 600px;
            border: 2px solid #ccc;
            border-radius: 10px;
            margin-top: -40px;
        }

        .CodeMirror-scroll {
            overflow: auto;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-container button {
            font-size: 18px;
            margin: 20px;
            margin-top: 0px;
            border-radius: 5px;
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
        // 弄一個codeMirror出來，設定佈景、語言模式
        var editor = CodeMirror.fromTextArea(document.getElementById("code-editor"), {
            lineNumbers: true,
            mode: "text/x-java",
            theme: "base16-dark"
        });

        // 移除註解及移除後的空白段落
        function removeCommentsAndEmptyLines(code) {
            // 利用正規表達式移除註解
            let noComments = code.replace(/\/\/.*/g, '').trim();
            // 移除空行
            let noEmptyLines = noComments.split('\n').filter(line => line.trim() !== '').join('\n');
            return noEmptyLines;
        }

        var submitBtn = document.getElementById('send-code');
        var templateCode = `for(){
            for(){
            }
            for(){
            }
        }`;
        submitBtn.addEventListener('click', () => {
            // 獲取編輯器內文字，在"// 程式撰寫區域"之後的值並將其分開，取目標code，並去空白
            var userCode = editor.getValue().split('// 程式撰寫區域')[1].trim();
            if (userCode) {
                // 執行剛剛移除註解的函式之後再將最外面的兩個大括號去除，就是我要判讀的code
                var cleanedCode = removeCommentsAndEmptyLines(userCode).replace('\n    }\n}', '').trim();
                if (cleanedCode && cleanedCode !== templateCode.trim()) {
                    // 測試用
                    // alert(templateCode.trim());
                    alert('您輸入的code為：\n' + cleanedCode);
                    // 將程式碼送入演算法，或是後端的判斷，如果success，顯現相應的效果，並執行通關
                    // 跑fetch進後端
                    fetch('/api/receive-usercode',{
                        method: 'Post',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ 
                            userCode: cleanedCode 
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        if(data.message === 'OK'){
                            alert('答對');
                        }
                    })


                } else {
                    alert('請輸入程式碼');
                }
            } else {
                alert('請輸入程式碼');
            }
        });
    </script>
</body>

</html>
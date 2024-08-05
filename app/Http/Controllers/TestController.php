<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
// 下面這兩類是用來執行java code的
// Symfony 的 Process 類是一個強大的工具，允許你從 PHP 中運行和控制外部進程。這在需要與操作系統進行交互或運行外部可執行文件的場景中特別有用，例如編譯和運行用戶提交的代碼
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;

class TestController extends Controller
{
    //
    public function index()
    {
        return view('Home');
    }
    public function projTest()
    {
        return view('projTest');
    }
    public function debug()
    {
        return view('debug');
    }
    public function syntaxPract()
    {
        return view('syntaxPract');
    }
    public function boxgame()
    {
        return view('boxgame');
    }
    public function unLock()
    {
        return view('unLock');
    }

    public function receiveUserCode(Request $request)
    {
        if ($request->isMethod('POST')) {
            // 從前端獲取userCode
            $userCode = $request->input('userCode');
            // 檢查用
            Log::info($userCode);

            // 確保目錄存在
            $directoryPath = storage_path('app/code');
            if (!File::exists($directoryPath)) {
                File::makeDirectory($directoryPath, 0755, true);
            }

            // 將使用者程式碼寫入 Java 文件
            $filePath = $directoryPath . '/Main.java';
            $javaCode = <<<EOD
public class Main {
    public static void main(String[] args) {
    $userCode
    }
}
EOD;
            file_put_contents($filePath, $javaCode);

            // 編譯 Java 程式碼
            $javacProcess = new Process(['javac', $filePath]);
            $javacProcess->run();

            if (!$javacProcess->isSuccessful()) {
                return response()->json([
                    'message' => 'Failed to compile Java code',
                    'error' => mb_convert_encoding($javacProcess->getErrorOutput(), 'UTF-8', 'auto'),
                ]);
            }

            // 執行 Java 程式碼
            $javaProcess = new Process(['java', '-cp', $directoryPath, 'Main']);
            $javaProcess->run();

            if (!$javaProcess->isSuccessful()) {
                return response()->json([
                    'message' => 'Failed to execute Java code',
                    'error' => mb_convert_encoding($javaProcess->getErrorOutput(), 'UTF-8', 'auto'),
                ]);
            }

            // 確保輸出為 UTF-8 編碼
            $output = mb_convert_encoding($javaProcess->getOutput(), 'UTF-8', 'auto');

            // 評估用戶程式碼的輸出
            if ($this->evaluateOutput($output)) {
                return response()->json(['message' => 'OK']);
            } else {
                return response()->json(['message' => 'Incorrect output']);
            }

        } else {
            return response()->json(['message' => 'http 錯誤']);
        }
    }

    private function evaluateOutput($output)
    {
        // 這裡添加你自己的評估邏輯
        // 示例：檢查輸出是否是期望的結果
        $expectedOutput = "your expected output here";
        return trim($output) === $expectedOutput;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
// 下面這兩類是用來執行java code的
// Symfony 的 Process 類是一個強大的工具，允許你從 PHP 中運行和控制外部進程。這在需要與操作系統進行交互或運行外部可執行文件的場景中特別有用，例如編譯和運行用戶提交的代碼
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

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
        if ($request->isMethod('Post')) {
            // 從前端獲取userCode
            $userCode = $request->input('userCode');
            // 檢查用
            Log::info($userCode);
            return response()->json(['message' => 'OK']);
        } else {
            return response()->json(['message' => 'http 錯誤']);
        }
    }

    private function getExpectedOutput()
    {
        // 返回預期的輸出結果
        // 這裡假設你有一個預期的正三角形輸出，實際上應根據你的需求來填寫
        return "預期的正三角形輸出";
    }
}

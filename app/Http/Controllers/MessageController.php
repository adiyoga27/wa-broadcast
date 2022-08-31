<?php

namespace App\Http\Controllers;

use App\Http\Requests\Message\CreateMessageRequest;
use App\Models\Message;
use App\Models\MessageAttachment;
use App\Models\MessageQueue;
use App\Models\SettingPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $settingId = SettingPermission::where("user_id", $user_id)->pluck('setting_id')->values();
        $messages = Message::whereIn('setting_id', $settingId)->get();
        return view('message.message', compact('messages'));
    }
    public function addMessage(CreateMessageRequest $request)
    {
        DB::beginTransaction();
        try {
            $message_id = Message::create([
                'setting_id' => $request->setting_id,
                'message' => $request->message,
            ]);

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $imageName = time().'.'.$image->extension(); 
                    $image->storeAs('message/images/', $imageName);
                    MessageAttachment::create([
                        'message_id' => $message_id->id,
                        'type' => 'image',
                        'path' => "storage/message/images/".$imageName,
                    ]);
                }
            }
            if ($request->hasFile('video')) {
                foreach ($request->file('video') as $video) {
                    $videoName = time().'.'.$video->extension(); 
                    $video->move('message/videos/', $videoName);
                    MessageAttachment::create([
                        'message_id' => $message_id->id,
                        'type' => 'video',
                        'path' => "storage/message/videos/".$videoName,
                    ]);
                }
            }
            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $fileName = time().'.'.$file->extension(); 

                    $file->storeAs('message/files/', $fileName);
                    MessageAttachment::create([
                        'message_id' => $message_id->id,
                        'type' => 'file',
                        'path' => 'storage/message/files/'.$fileName,
                    ]);
                }
            }
            DB::commit();
            return redirect()->back()->with('success', 'Message added successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            return redirect()->back()->with('failed', $th->getMessage());

        }
       
    }
    public function queue($id)
    {
        $messages = MessageQueue::where('message_id', $id)->get();
        return view('message.queue', compact('messages'));
    }
}

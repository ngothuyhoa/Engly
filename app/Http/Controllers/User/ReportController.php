<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\ReportRepository;
use App\Contracts\Repositories\PostRepository;
use auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $reportRepository;
    protected $postRepository;

    public function __construct(ReportRepository $reportRepository, PostRepository $postRepository)
    {
        $this->middleware('auth');
        $this->reportRepository = $reportRepository;
        $this->postRepository = $postRepository;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('page_user.report.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        
        $data = [
            'user_id' => Auth::user()->id,
            'post_id' => (int)$id,
            'note' => $request->report,
            'status' => 0,
        ];

        $this->reportRepository->store($data);

        $post = $this->postRepository->findOrFail($id);
        $notification = array(
            'message' => 'Gửi report thành công!',
            'alert-type' => 'success'
        );

        return redirect()->route('post_detail', ['slug' => $post->slug])->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

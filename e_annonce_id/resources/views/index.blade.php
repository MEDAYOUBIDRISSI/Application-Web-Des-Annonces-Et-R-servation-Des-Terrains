@extends("master1.master")

@section("content")
        <navbar></navbar>
        <div class="fixed-sidebar right home1">
		    <div class="chat-friendz">
                <sidebare></sidebare>
                <chats></chats>
            </div>
        </div>
        <router-view></router-view>
    <fouterbootom></fouterbootom>
@endsection

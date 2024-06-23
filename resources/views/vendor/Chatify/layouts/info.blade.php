{{-- User info and avatar --}}
<div class="avatar av-l chatify-d-flex"
     style="background-image: url('{{ Auth::user()->photo ? asset('storage/photos/' . Auth::user()->photo) : asset('path/to/default/avatar.png') }}');">
</div>
<p class="info-name">{{ Auth::user()->name }}</p>
<div class="messenger-infoView-btns">
    <a href="#" class="danger delete-conversation">Supprimer Conversation</a>
</div>

{{-- Shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title"><span>Photos partagés</span></p>
    <div class="shared-photos-list"></div>
</div>

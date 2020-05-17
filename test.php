<?php
foreach ($msg as $msgItem) {
    if ($msgItem->name == $currentUser) {} else {
    echo `<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">@ ` . $msgItem->name . `</label>

    <div class="col-md-6">
        <div class="form-control">` . $msgItem->content . `</div>
        <div style="float: left;">` . $msgItem->created_at . `</div><a href="/user/` . 
        $msgItem->id . `/chat" class="btn btn-primary" style="float: right;">Reply</a>
    </div>
</div>`;
    $currentUser = $msgItem->name;}
}

@isset($options['register_rule'])
<div id="modal_policy" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h5 class="modal-title">Правила пользования</h5>
            </div>

            <div class="modal-body">
                {!! $options['register_rule'] !!}
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Ясно!</button>
            </div>
        </div>
    </div>
</div>
@endisset
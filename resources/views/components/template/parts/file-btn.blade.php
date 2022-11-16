<button type="button" id="fileBtn" class="btn btn-primary">
    <i class="fas fa-image mx-2"></i>
    <span class="fw-bold text-light">
        {{$text}}
    </span>
</button>

<script>
    $('#fileBtn').click(function(){
        $("input[type=file]").trigger('click')
    })
</script>
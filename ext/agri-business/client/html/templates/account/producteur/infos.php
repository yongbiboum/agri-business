<div align="center" style="margin-bottom: 10px ">
    <img width="100px" height="100px" src="/packages/assets/images/shop/user.png" alt="" class="">
</div>
<div class="flex-container">
    <div class="blocks" style="border-right: 1px grey ; border-right-style:  dashed ; "  >
        <div class="card card-warning">
            <div class="card-body">
                <form role="form">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Nom d'utilisateur</label>
                        <input type="text" class="form-control" id="name" value="<?= Auth::user()->name?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" value="<?= Auth::user()->email?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Date de Naissance</label>
                        <input type="date" min="1919-12-31" class="form-control" id="naissance" value="<?= Auth::user()->naissance?>" disabled>
                    </div>

                    <!-- Select multiple-->
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <div class="blocks"
    <div class="card card-warning">
        <div class="card-body">
            <form role="form">
                <!-- text input -->
                <div class="form-group">
                    <label>Compagnie</label>
                    <input type="text" class="form-control" id="compagnie" value="<?= Auth::user()->compagnie?>" disabled>
                </div>
                <div class="form-group">
                    <label>Profession</label>
                    <select id="profession" class="form-control">
                        <option disabled selected><?= Auth::user()->profession?></option>
                    </select>
                    <select class="form-control" style="display: none" id="select" >
                        <option value="industriel">Industriel</option>
                        <option value="grossiste">Grossiste</option>
                        <option value="revendeur">Revendeur</option>
                        <option value="particulier">Particulier</option>
                        <option value="exportateur">Exportateur</option>
                        <option value="autres">Autres ...</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Contact </label>
                    <input type="tel" id="phone" class="form-control" value="<?= Auth::user()->contact?>" disabled>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>
</div>
<br />
<div class="flex-containers">
    <div class="product-extra-link" align="center">
        <a href="#" onclick="enable();disp();" id="modif" class="addcart-link">Modifier</a>
    </div>
    <div class="product-extra-link" id="annuler" align="center" style="display: none; margin-left: 5px ">
        <a href="" onclick="document.location.reload(true)"  style="background-color: red;" class="addcart-link">Annuler</a>
    </div>
</div>
<script src="/packages/assets/js/intlTelInput.js"></script>
<script src="/packages/assets/js/utils.js"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input);
</script>
<script>

    function disp() {
        document.getElementById("annuler").style.display= "block";
        document.getElementById("profession").style.display= "none";
        //$('#modif').val("Valider") ;
    }
    function enable() {
        document.getElementById("name").disabled = false;
        document.getElementById("email").disabled = false;
        document.getElementById("naissance").disabled = false;
        document.getElementById("compagnie").disabled = false;
        document.getElementById("phone").disabled = false;
        document.getElementById("select").style.display= "block";

    }
    function submit() {
    }
</script>

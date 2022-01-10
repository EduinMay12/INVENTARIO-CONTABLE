<?php

    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $username = $row['username'];
        $email = $row['email'];
        $website = $row['website'];
    } else {
        echo "0 results";
    }
?>
<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Nombre</label>
        <div class="col-lg-6">
            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="Cambia tu Nombre">
            <span class="error form-text text-red"><?php echo $nameErr; ?></span>
        </div>
    </div>

    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">RFC</label>
        <div class="col-lg-6">
            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="Cambia RFC">
            <span class="error form-text text-red"><?php echo $usernameErr; ?></span>
        </div>
    </div>

    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Correo</label>
        <div class="col-lg-6">
            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Cambiar Acceso de correo Electronico">
            <span class="error form-text text-red"><?php echo $emailErr; ?></span>
        </div>
    </div>

    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">WEB</label>
        <div class="col-lg-6">
            <input type="text" class="form-control" name="website" value="<?php echo $website; ?>" placeholder="Cambia tu Pagina Web">
            <span class="error form-text text-red"><?php echo $websiteErr; ?></span>
        </div>
    </div>
    <div class="em-separator separator-dashed"></div>
    <div class="text-right">
        <button class="btn btn-gradient-02" type="submit">Actualizar Información</button>
    </div>
    
</form>

<div class="container-fluid">
        <div class="jumbotron">
            <h2>Nós temos hoje <?php echo $total_anuncios;?> anúncios.</h2>
            <p>E mais <?php echo $total_usuarios;?> usuários cadastrados.</p>
        </div>

        <div class="row">
        <div class="col-sm-3">
            <h4>Pesquisa Avançada</h4>
            <form method="GET">
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select id="categoria" name="filtros[categoria]" class="form-control">
                        <option></option>
                        <?php foreach($categorias as $cat): ?>
                            <option value="<?php echo $cat['id'];?>"<?php 
                            echo($cat['id'] == $filtros['categoria'])?'selected=
                            "selected"':'';?>>
                            <?php echo $cat['nome'];?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <select name="filtros[preco]" id="preco" class="form-control">
                        <option></option>
                        <option value="0-100" <?php echo($filtros['preco'] == '0-100')?
                        'selected="selected"':'';?>>R$ 0 - 100</option>
                        <option value="101-300" <?php echo($filtros['preco'] == '101-300')?
                        'selected="selected"':'';?>>R$ 101 - 300</option>
                        <option value="301-500" <?php echo($filtros['preco'] == '301-500')?
                        'selected="selected"':'';?>>R$ 301 - 500</option>
                        <option value="501-1000" <?php echo($filtros['preco'] == '501-1000')?
                        'selected="selected"':'';?>>R$ 501 - 1000</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="estado">Estado de Conservação:</label>
                    <select name="filtros[estado]" id="estado" class="form-control">
                        <option></option>
                        <option value="0" <?php echo($filtros['estado'] == '0')?
                        'selected="selected"':'';?>>Ruim</option>
                        <option value="1" <?php echo($filtros['estado'] == '1')?
                        'selected="selected"':'';?>>Bom</option>
                        <option value="2" <?php echo($filtros['estado'] == '2')?
                        'selected="selected"':'';?>>Ótimo</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Buscar">
                </div>

            </form>
        </div>
        <div class="col-sm-9">
            <h4>Últimos Anúncios</h4>
            <table class="table table-striped">
                <tbody>
                    <?php foreach($anuncios as $anuncio): ?>
                        <tr>
                            <?php if(!empty($anuncio['url'])): ?>
                                <td><img border="0" 
                                src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $anuncio['url']; ?>" 
                                height="50" /></td>
                            <?php else: ?>
                                <td><img src="<?php echo BASE_URL; ?>assets/images/default.jpg" height="50" 
                                border="0" ?></td>
                            <?php endif; ?>
                        <td><a href="<?php echo BASE_URL; ?>produto/abrir/<?php echo $anuncio['id'];?>"><?php echo $anuncio['titulo']; ?></a><br/>
                        <?php echo $anuncio['categoria']; ?></td>
                        <td>
                            <td><?php echo 'R$ '.number_format($anuncio['preco'],2,',','.'); ?></td>

                        </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

            <ul class="pagination">
                <?php for($q=1;$q<=$total_paginas;$q++): ?>
                    <li class="page-item <?php echo($p == $q)?'active':''?>">
                    <a class="page-link" href="<?php echo BASE_URL; ?>?<?php 
                    $w = $_GET;
                    $w['p'] = $q;
                    echo http_build_query($w)
                    ?>">
                    <?php echo ($q); ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>

    </div>

<?php foreach($produktuak as $p): ?>
    <div style="margin-bottom: 20px;">
        <img src="../img/<?php echo htmlspecialchars((string)$p->getId()); ?>.png" style="width:100px;">
        <p>
            <a href="?id=<?php echo $p->getId(); ?>">
                <strong><?php echo htmlspecialchars($p->getIzena()); ?></strong>
            </a>
        </p>
        <p><?php echo htmlspecialchars((string)$p->getPrezioa()); ?>€</p>
        <p><?php echo htmlspecialchars($p->getDeskribapena()); ?></p>
        <hr>
    </div> 
<?php endforeach; ?>
<!-- categoreis -->
<div class="boxCategories">
	<h4 class="titlebar">Xe Mới</h4>
	<ul class="categories">
		<?php foreach ($category[0] as $index => $value){?>
		<li><a href="<?php echo WEB_ROOT.'/xe-moi/'. $value['uri']?>"><?php echo $value['name']?> <?php echo isset($countCarsByCat[$value['caid']]) ? '('.$countCarsByCat[$value['caid']]['countt'].')' : ''?></a>
			<?php if(isset($category[$value['caid']]) && count($category[$value['caid']]) > 0) {?>
			<ul>
				<?php foreach ($category[$value['caid']] as $index1 => $value1){?>
				<li><a href="<?php echo WEB_ROOT.'/xe-moi/'. $value['uri'].'/'.$value1['uri']?>"><?php echo $value1['name']?> <?php echo isset($countCarsByCat[$value1['caid']]) ? '('.$countCarsByCat[$value1['caid']]['countt'].')' : ''?></a></li>
				<?php }?>

			</ul>
			<?php }?>
		</li>
		<?php }?>

	</ul>
</div>
<!-- en categories -->
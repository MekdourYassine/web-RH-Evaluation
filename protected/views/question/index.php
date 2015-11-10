<style type="text/css">
.summary
{
    display: none;
}

</style>
<?php
$this->breadcrumbs=array(
	'Questions',
);

$this->menu=array(
array('label'=>'Create Question','url'=>array('create')),
array('label'=>'Manage Question','url'=>array('admin')),
);
?>
<section id="recent-works">
        <div class="container">
            <div class="center wow fadeInDown">
                <br>
                <h2>LISTE DES QUESTIONS</h2>
            </div>
            
                    <?php
            $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                'id' => 'filter-form',
                'type' => 'horizontal',
                'method' => 'GET',
            ));
            ?>
            
            <div class="form-group">
                <div class="col-sm-4">
                    <input type="search" class="form-control" name="query" placeholder="Recherche des questions" >
                </div>
                
        <?php  $this->widget(
        'booster.widgets.TbButton',
        array(
            'buttonType'=>'submit',
            'label' => 'Rechercher',
            'context' => 'danger',
            'icon'=>'search',
             ));?>
           </div>
            
            <?php
            $this->endWidget(); ?>        
     
                

<?php  $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view_nouv',
'itemsTagName'=>'table',
'itemsCssClass'=>'items table table-striped table-condensed',
'template' => "{sorter}\n{items}\n{pager}",
)); 
?>
</div>
</section>
       
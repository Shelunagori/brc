<?php $colors=['#1AB696', '#999DAB', '#F3CC6F', '#FA6E58', '#334D8F', '#C8A66A', '#A4BF5B', '#31A8B8', '#91AAC7', '#F24A4A']; ?>
<div style="background: #EBEEF3;">
    <input type="hidden"  id="tableInput" />
    <div class="row TableView" style="padding:10px;">
        <div style=" margin-bottom: 10px; text-align: center; margin-top: 10px; "><span id="TablesHeading" style="font-weight: bold;color:#373435;" > TABLES </span></div>
        <div class="col-md-12"  align="center">
            <?php 
            $i=0;
            foreach($Tables as $Table){ ?>
            <div class="tblBox <?php if($coreVariable['role']=='steward' && $Table->status=='occupied'){ echo 'goToKot'; } ?>" table_id="<?= h($Table->id) ?>" table_name="<?= h($Table->name) ?>">
                <span class="tblLabel" style="background-color:<?php echo $colors[$i++]; ?>" ><?= h($Table->name) ?></span>
                <?php if($Table->status=='occupied'){ ?>
                    <div style="font-size:14px;">
                        <div align="center">
                            <span style="font-size: 14px; color: #3b393a;">.</span>
                        </div>
                        <div style="padding:2px 10px;">
                            <table width="100%" style="font-size:12px;line-height: 22px;">
                                <tr>
                                    <td valign="top">
                                        <span style="color:#96989A;">Time</span>
                                        <span style="color:#373435;margin-left:13px;" id="timeLabel_<?php echo $Table->id; ?>" ></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <span style="color:#96989A;">Customer Name</span>
                                        <span style="color:#373435;margin-left:13px;"><?php echo $Table->c_name; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <span style="color:#96989A;">No. of Pax</span>
                                        <span style="color:#373435;margin-left:13px;"><?php echo $Table->no_of_pax; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <span style="color:#96989A;">Pax Per Rate</span>
                                        <span style="color:#373435;margin-left:13px;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <span style="color:#96989A;">Running Billing Amount</span>
                                        <span style="color:#373435;margin-left:13px;"></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div style="font-size:14px;">
                        <div align="center">
                            <span style="font-size: 14px; color: #3b393a;">.</span>
                        </div>
                        <div style="padding:2px 10px;">
                            <table width="100%" style="font-size:12px;line-height: 22px;">
                                <tr>
                                    <td valign="top">
                                        <div align="center" >
                                            <?php echo $this->Html->image('/table-icon.png', ['alt' => 'Empty Table']); ?>
                                            <br/>
                                            <?php if($coreVariable['role']=='guard'){ ?>
                                                <span class="EmptyTbl" table_id="<?= h($Table->id) ?>" table_name="<?= h($Table->name) ?>">Available Now</span>
                                            <?php }else{ ?>
                                                <span style="color: #97999B;">Available Now</span>
                                            <?php } ?>
                                           
                                            <div style="height: 37px;"></div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php 
            if($i==10){ $i=0; }
            } ?>
        </div>
    </div>
</div>


<style>
.goToKot:hover{
    cursor: pointer;
}
.EmptyTbl{
    color: #FFF; background-color: #4FC777; padding: 7px 14px;font-size:12px;cursor: pointer;margin-left: 2px;
}
.EmptyTbl:hover{
    cursor: pointer;
}
#kotBox td{
    padding:12px 0px;
}
.tblBox{
    width: 240px; margin: 10px;
    background-color: #FFF;
    padding: 7px;
    border-radius: 7px !important;
    position: relative;
    margin-bottom:25px;
    display: inline-block;
}
.tblLabel{
    position: absolute;
    top: -15px;
    left: 15px;
    padding: 7px 6px;
    background-color: #FA6E58;
    color: #FEFEFE;
    border-radius: 5px !important;
    font-weight: bold;
}


#TablesHeading{
    color: #f16969;
    font-size: 16px;
}
.registerCustomer{
    color: #FFF; background-color: #FA6775; padding: 7px 14px;font-size:12px;cursor: pointer;margin-left: 2px;
}
.closeCustomerBox{
    color: #000; background-color: #E6E7E8; padding: 7px 14px;font-size:12px;cursor: pointer;margin-right: 2px; 
}
</style>


<?php echo $this->Html->css('/assets/animate.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
<?php
$js="
$(document).ready(function() {
    $('.EmptyTbl').die().live('click',function(event){
        var table_id=$(this).attr('table_id');
        var table_name=$(this).attr('table_name');
        $('span#tableLabel').html(table_name);
        $('input[name=table_id]').val(table_id);
        $('#customerRegistrationBox').show();
    });

    $('.closeCustomerBox').die().live('click',function(event){
        $('#customerRegistrationBox').hide();
    });

    $('.registerCustomer').die().live('click',function(event){
        var table_id=$('input[name=table_id]').val();
        var c_name=$('input[name=c_name]').val();
        var c_mobile=$('input[name=c_mobile]').val();
        var c_pax=$('select[name=c_pax] option:selected').val();
        
        if(c_mobile.length!=10){
            alert('Mobile No should be of 10 digits.');
            return;
        }
        if(c_pax==0 || c_pax==''){
            alert('Select no of pax.');
            return;
        }

        var url='".$this->Url->build(['controller'=>'Tables','action'=>'save-table'])."';
        url=url+'?c_name='+c_name+'&c_mobile='+c_mobile+'&c_pax='+c_pax+'&table_id='+table_id;
        $.ajax({
            url: url,
        }).done(function(response) {
            if(response==1){
                $('#customerRegistrationBox').hide();
                location.reload();
            }else{
                alert('!! Something went wrong. Customer not registered.');
                return;
            }               
        });
    });

    $('input[name=c_mobile]').die().live('keydown',function(e){
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }   
    }); 

   
    $('.goToKot').die().live('click',function(event){
        var table_id=$(this).attr('table_id');
        var table_name=$(this).attr('table_name');
        var url='".$this->Url->build(['controller'=>'Kots','action'=>'new'])."';
        url=url+'/'+table_id;
        window.location.href = url;
    }); 

});
";

foreach($Tables as $Table){
    if($Table->status=='occupied'){
        $js.="
            setInterval(
                function(){
                    var startTime = new Date(".$Table->occupied_time->format('Y,m-1,d,H,i,s').");
                    var thisTime = new Date();
                    var diff = thisTime.getTime() - startTime.getTime();
                    var hh = Math.floor(diff / 1000 / 60 / 60);
                    diff -= hh * 1000 * 60 * 60;
                    var mm = Math.floor(diff / 1000 / 60);
                    diff -= mm * 1000 * 60;
                    var ss = Math.floor(diff / 1000);
                    if(hh==0){ var t=mm+':'+ss; }
                    else{ var t=hh+':'+mm+':'+ss; }
                    $('span#timeLabel_".$Table->id."').html(t);
                }
            , 1000);
        ";
    }
    
}

echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom'));
?>

<div id="customerRegistrationBox" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none; padding-right: 12px;">
    <div class="modal-backdrop fade in" ></div>
    <div class="modal-dialog modal-sm" style="width: 400px !important;">
        <div class="modal-content" style=" padding: 20px; ">
            <div class="modal-body">
                <div style=" text-align: center; padding: 0px 0 15px 0px; font-size: 15px; font-weight: bold; color: #2D4161; ">CUSTOMER REGISTRATION</div>
                <div align="center">TABLE: <span id="tableLabel"></span><input type="hidden" name="table_id"></div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="c_name" class="form-control" placeholder="Name" style="background-color: #F5F5F5;">
                </div>
                <br/>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-mobile" style=" font-size: 20px; "></i></span>
                    <input type="text" name="c_mobile" class="form-control" placeholder="Mobile No." style="background-color: #F5F5F5;" maxlength="10" minlength="10">
                </div>
                <br/>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-sitemap"></i></span>
                    <select name="c_pax" class="form-control" style="background-color: #F5F5F5;">
                        <option value="" style="display: none;">Select No. of Pax</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <br/><br/>
                <div align="center">
                    <span class="closeCustomerBox">CLOSE</span>
                    <span class="registerCustomer">REGISTER</span>
                </div>
            </div>
        </div>
    </div>
</div>
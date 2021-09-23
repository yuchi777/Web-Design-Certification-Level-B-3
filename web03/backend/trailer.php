<style>
    .trailer-header, .trailer-add{
        display: flex;
        justify-content: space-between;
    }

    .trailer-header .items{
        width: 24%;
        background: #bbb;
        text-align: center;
        margin: 5px 0 ;
    }

    .trailer-body{
        height: 220px;
        /* padding: 5px; */
        overflow: auto;
    }

    .trailer-body .row{
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: center;
        margin: 3px 0;
        background: white;
        padding: 3px 0 ;
    }

    .row>div{
        width: 24% ;
    }

    .trailer-add > div{
        width: 48%;
        margin-top: 10px;
    }
</style>

<div class="tab">
    <div style="height: 320px; width:95%; background:#ccc">
        <div class="ct" style="border: 1px solid #666;padding:5px">預告片清單</div>
        <div class="trailer-header">
            <div class="items">預告片海報</div>
            <div class="items">預告片片名</div>
            <div class="items">預告片排序</div>
            <div class="items">操作</div>
        </div>
        <div class="trailer-body">
        <?php
            $trailers = $Trailer->all(['sh'=>1], 'order by rank');
            foreach($trailers as $trailer){        
        ?>
            <div class="row">
                <div><img src="img/<?=$trailer['img']?>" style="width: 60px;height: 80px;"></div>
                <div><input type="text" name="name[]" value="<?=$trailer['name']?>"></div>
                <div>
                    <input type="button" value="往上">
                    <input type="button" value="往下">
                    <?=$trailer['rank']?>
                </div>
                <div>
                    <input type="checkbox" name="sh[]" value="<?=$trailer['id']?>" <?=($trailer['sh']==1)?'checked':'';?>>顯示
                    <input type="checkbox" name="del[]" value="<?=$trailer['id']?>">刪除
                    <select name="ani[]" id="">
                        <option value="1" <?=($trailer['ani']==1)?'selected':'';?>>淡入淡出</option>
                        <option value="2" <?=($trailer['ani']==2)?'selected':'';?>>縮放</option>
                        <option value="3" <?=($trailer['ani']==3)?'selected':'';?>>滑入滑出</option>
                    </select>
                </div>
            </div>
        <?php
        }
        ?>
        </div>
        <div class="ct trailer-btn" style="margin-top:2px;">
            <input type="submit" value="編輯確定">
            <input type="reset" value="重置">
        </div>


    </div>

    <hr>

    <div style="height: 160px; width:95%; background:#ccc">
        <div class="ct" style="border: 1px solid #666;padding:5px">新增預告片海報</div>

        <form action="api/add_trailer.php" method="post" enctype="multipart/form-data">
            <div class="trailer-add">
                <div>預告片海報: <input type="file" name="img" id=""></div>
                <div>預告片片名: <input type="text" name="name" id=""></div>
            </div>
            <div class="ct trailer-btn">
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </div>
        </form>


    </div>
</div>
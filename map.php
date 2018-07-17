<!DOCTYPE>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>getTilt / setTilt ���\�b�h | �ݒu�T���v��</title>
    <!-- �X�}�[�g�t�H������viewport�̎w�� -->
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <!-- Google Maps API�̓ǂݍ��� -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript">
        var map;
        //�����ݒ�
        function initialize() {
            var deg=rchk();
            /* �ܓx�E�o�x�F�T���^�E�N���[�Y�E�r�b�O�E�c���[�Y & �p�V�t�B�b�N�E���C���E�F�C���{�[�h�E�H�[�N�w 3rd St, �T���^�N���[�Y �J���t�H���j�A 95060 �A�����J���O�� */
            var latlng=new google.maps.LatLng(36.31512514748051,140.2734375);
            /* �n�}�̃I�v�V�����ݒ� */
            var myOptions = {
                /*�����̃Y�[�� ���x�� */
                zoom: 18,
                /* �n�}�̒��S�_ */
                center:latlng,
                /* �n�}�^�C�v */
                mapTypeId: google.maps.MapTypeId.SATELLITE,
                setTile:deg,
                  disableDefaultUI:true
            };
            map=new google.maps.Map(document.getElementById("map"), myOptions);
        }
        //�`�F�b�N
        function rchk(){
            var deg=0;
            var obj=document.getElementsByName("deg");
            for(var i=0; i<obj.length; i++){
                if(obj[i].checked){
                    deg=parseInt(obj[i].value);
                }
            }
            return deg;
        }
        function tpchk(){
            var tp=0;
            var obj=document.getElementsByName("tp");
            for(var i=0; i<obj.length; i++){
                if(obj[i].checked){
                    tp=obj[i].value;
                }
            }
            if(tp=="HYBRID"){
                map.setMapTypeId(google.maps.MapTypeId.HYBRID);
            }else if(tp=="SATELLITE"){
                map.setMapTypeId(google.maps.MapTypeId.SATELLITE);
            }
            return tp;
        }
        //�n�}�^�C�v�ݒ�
        function setType(){
            map.mapTypeId(tpchk());
            console.log(map.getMapTypeId());
        }
        //�n�}�̌X���ݒ�
        function setTileDeg(){
            map.setTilt(rchk());
            console.log(map.getTilt());
        }
        //�n�}�̈ܓx�E�o�x�ݒ�
        function setLatLng(lat,lng){
            var latlng=new google.maps.LatLng(lat, lng);
            map.setCenter(latlng);
        }
    </script>
    <style type="text/css">
        * { margin:0; padding:0; font-size:12px; }
        html, body { margin:0; padding:0; }
        h1, p { margin:10px; }
        #map { width:100%; height:500px; }
    </style>
</head>
<body onload="initialize()">
    <h1>getTilt / setTilt ���\�b�h</h1>
    <form id="frm" name="frm">
        <p>
            �n�}�̃^�C�v�F
            <label for="tp_1"><input type="radio" name="tp" id="tp_1" value="HYBRID" onclick="setType()" />HYBRID</label>
            <label for="tp_2"><input type="radio" name="tp" id="tp_2" value="SATELLITE" checked="checked" onclick="setType()" />SATELLITE</label>
            �@/�@
            �n�}�̌X���F
            <label for="deg_1"><input type="radio" name="deg" id="deg_1" value="0" onclick="setTileDeg()" />0</label>
            <label for="deg_2"><input type="radio" name="deg" id="deg_2" value="45" checked="checked" onclick="setTileDeg()" />45</label>
            <br>
            �ܓx�E�o�x�F
            <label for="lt_1"><input type="radio" name="lt" id="lt_1" value="0" checked="checked" onclick="setLatLng(36.964758,-122.015539)" />�����ٰ�ޥ�ޯ�ޥ�ذ�� & �߼̨���ڲٳ��=�ް�޳����w</label>
            <label for="lt_2"><input type="radio" name="lt" id="lt_2" value="45" onclick="setLatLng(36.964436,-122.017623)" />�ްĳ��� �����ٰ��</label>
        </p>
    </form>
    <!-- �n�}�̖��ߍ��ݕ\�� -->
    <div id="map"></div>
</body>
</html>
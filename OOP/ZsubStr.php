<?php
class ZsubStr{
    function chinesesubstr($str,$start,$len){
        $strlen = $len - $start;                     //定义需要截取字符的长度
        for($i=0;$i<$strlen;$i++){                   //使用循环语句，单字截取，并用$tmpstr.=$substr(？，？，？)加起来
            if(ord(substr($str,$i,1))>0xa0){         //ord()函数取得substr()的第一个字符的ASCII码，如果大于0xa0的话则是中文字符
                @$tmpstr.=substr($str,$i,3);         //设置tmpstr递加，substr($str,$i,3)的3是指三个字符当一个字符截取(因为utf-8编码的三个字符算一个汉字)
                $i+=2;
            }else{                                   //其他情况（英文）按单字符截取
                @$tmpstr.=substr($str,$i,1);
            }

        }
        return $tmpstr;
    }
}

?>
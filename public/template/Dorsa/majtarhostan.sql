Select Form850.code,
 (select text from eform_define_sub_control where formid=850 and controlid='ddl1'  and value=Form850.ddl1 ) as  sal  ,
 ddl3 as  sharestan  ,
Form850.namelog as  namelogin  ,
(select text from eform_define_sub_control where formid=850 and controlid='rbl1'  and value=Form850.rbl1 ) as  noe  ,
Form848.Itemsgroup as rasteh , 
(select Form849.subject2 from Form849 where convert(nvarchar(50),code)=Form850.ddl5 )  as  grasteh  ,
(select text from eform_define_sub_control where formid=850 and controlid='rbl2'  and value=Form850.rbl2 ) as  shakhsh  ,
Form850.txt2 as  name  , 
Form850.txt3 as zarfiyat  ,
(select text from eform_define_sub_control where formid=850 and controlid='ddl6'  and value=Form850.ddl6 ) as  vahed  ,
(select text from eform_define_sub_control where formid=850 and controlid='ddl7'  and value=Form850.ddl7 ) as  moshkgel  ,
Form850.txt4 as  nafar  , 
(select text from eform_define_sub_control where formid=850 and controlid='ddl8'  and value=Form850.ddl8 ) as  hmoshkgel  ,
Form850.txt_other as sayer,
Form850.txt_other1 as sayerrm,
Form850.txt5 as  add1  , 
Form850.txt6 as  tel  , 
Form850.txt7 as  tozihat  , 
Form850.txt8 as  codeposti  , 
Form850.txt9 as  nameostan    
from Form850 left join Form848 on Form850.ddl4=Form848.code 
WHERE aspnet_Users.UserName=@login and
 (txt2 like '%'+ @txt2+'%' or @txt2='')
and  (rbl1 =@rbl1 or @rbl1 ='-1'  or @rbl1 ='4'  )
and (ddl4 =@ddl4 or @ddl4 ='-1'    )






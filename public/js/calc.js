function chk_all() { 
	chk1();
	chk_sw();
}


function toNum( num )
{
  str = new String(num);

  if (str.indexOf( "," ) > 0)
  {
    new_str = str.split(',');
    res_str = new_str[0] + "." + new_str[1];
    return res_str;
  }
return num
}

function LimitNum( Num, NamePar, NumMax, NumMin )
{
  if (Num>NumMax) 
  	{ 
		Num=NumMax;		
		c[NamePar].value = Num;
	}
  if (Num<NumMin) 
  	{ 
	 	Num=NumMin;
		c[NamePar].value = Num;
	}
  
return Num
}


function chk1() { 
	c = document.forms['FormCond'].elements;
	if (c.c1.checked) 
	{
		//alert("ON");
		c.Kv.disabled = 0;
		document.getElementById('Sel_Text_vent').style.color ="#555555";
	}
	else 
	{
		//alert("OFF"); 
		c.Kv.disabled = 1;
		document.getElementById('Sel_Text_vent').style.color ="#A9A9A9";
	}
	
	calcCondPower();
}


function chk_sw() { 
	c = document.forms['FormCond'].elements;
	if (c.c_sw.checked) 
	{
		//alert("ON");
		c.s_win.disabled = 0;
		document.getElementById('Sel_Text_sw').style.color ="#555555";
	}
	else 
	{
		//alert("OFF"); 
		c.s_win.disabled = 1;
		document.getElementById('Sel_Text_sw').style.color ="#A9A9A9";
	}
	
	calcCondPower();
}


function calcCondPower()
{
  c = document.forms['FormCond'].elements;
  
  Lv_const = 0.0075;
  
  S = toNum( c['S'].value );
  S = LimitNum( S, 'S', 2000, 5);
  H = toNum( c['H'].value );
  H = LimitNum( H, 'H', 5, 1.5);
  G = toNum( c['G'].options[c['G'].options.selectedIndex].value );
  Comp = toNum( c['comp'].options[c['comp'].options.selectedIndex].value );
  TV = toNum( c['tv'].options[c['tv'].options.selectedIndex].value );
  P = toNum( c['P'].options[c['P'].options.selectedIndex].value );
  pwr_dif = toNum( c['pwr_dif'].value );
  pwr_dif = LimitNum( pwr_dif, 'pwr_dif', 20, 0);
  Kv = toNum( c['Kv'].value ); 
  Sw = toNum( c['s_win'].value ); 
  Sw = LimitNum( Sw, 's_win', 20, 0);
  
  Q1 = (G/1000)*S*H
  Q2 = P*0.1
  Q3 = Comp*0.3+TV*0.2 + pwr_dif*0.3 
  
  if (c.c1.checked)
  	Kv_Sel = Kv;
  else
    Kv_Sel = 0;	
  Pvent = Kv_Sel *  S * H * Lv_const; 
  
  
  if (c.c_sw.checked && Sw > 2)
   {
  	if (G < 32)
		Q_win = (Sw-2)*0.075;
	if (G > 32 && G < 37)
		Q_win = (Sw-2)*0.15;
	if (G > 38)
		Q_win = (Sw-2)*0.25;
   }
  else
    Q_win = 0;
  
    
  if (c.c_hg.checked)
  	Q_hg = Q1 * 0.15;
  else
    Q_hg = 0;
 
  if (c.c_cool.checked)
  	Q_cool = (Q1 + Q_hg) * 0.2;
  else
    Q_cool = 0;
		 
  Qext = Pvent + Q_win + Q_cool + Q_hg;
  
  pwr_cond_base = Q1 + Q2 + Q3;
  pwr_cond = pwr_cond_base + Qext;
  if (pwr_cond < 10)
  	k_round = 100;
  else if (pwr_cond < 100)
  	k_round = 10;
  else 
  	k_round = 1;	
  pwr_cond = Math.round((pwr_cond_base + Qext)*k_round)/k_round;  
  Qrel = Math.round(Qext/Q1*100);
  
  c['Q'].value = pwr_cond;
  OutCond(Qrel);
}

function OutCond(Qrel)
{
  c = document.forms['FormCond'].elements;
  SText = "";
  qq = document.all["Models"];
  
	qq.innerHTML = SText;	
	
	if (pwr_cond < 10)
  		k_fix = 2;
  	else if (pwr_cond < 100)
  		k_fix = 1;
  	else 
  		k_fix = 0;	
	pwr_out_c = document.all["Power_Out"];	
	pwr_out_c.innerHTML = pwr_cond.toFixed(k_fix) + ' кВт';
	
	pwr_out_rng = document.all["Power_Out_Range"];
	pwr_out_tr = document.all["Power_Out_TR"];
	if (pwr_cond<25)
		{
			pwr_out_tr.innerHTML = '<b>Рекомендуемый диапазон  Q<sub>range</sub>:</b>';
			pwr_out_rng.innerHTML = (pwr_cond*0.95).toFixed(k_fix) + ' &ndash; ' + (pwr_cond*1.15).toFixed(k_fix) + ' кВт';
		}			
	else
		{
			pwr_out_tr.innerHTML = '<span style="color:  #969696; font-size:90%;">Калькулятор предназначен для расчета <br> мощности только бытовых кондиционеров</span>';
			pwr_out_rng.innerHTML = '&nbsp;';
		}			
	
	q_ext_nt = document.all["Q_Ext_Note"];
	if ((Qrel<=1) || (pwr_cond>=25))
		q_ext_nt.innerHTML = '&nbsp;';
	else if (Qrel<14)
		q_ext_nt.innerHTML = '<b style="color:  #969696;">Мощность Q1 увеличилась на ' + Qrel + '%</b>';
	else
		q_ext_nt.innerHTML = '<b style="color:  #969696;">Мощность Q1 увеличилась на ' + Qrel + '%, рекомендуем использовать <br> инверторный кондиционер</b>';   
}
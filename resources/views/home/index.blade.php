@extends('layout.home')
@section('title',$title)
@section('main')
<!--container start-->
<div class="banner" id="J_Banner" style="background-image: url(/home/static/images/bg-carousel-1.jpg);background-repeat: repeat;">
	<div class="ly-wrap">
			<div class="J_Slider banner-top" data-style="filter">
				<a href="javascript:;" class="slider-btn prev"></a>
				<a href="javascript:;" class="slider-btn next"></a>
				<ul>
                                         					<li data-bg-src="https://avatar.kuangxiangit.com/novel/img_index_recommend/carousel/20190412095651170.jpg">
						<a target="_blank" href="https://app.hbooker.com/setting/event?item=tonggao_tz&noticeid=81" target="_blank">
							<img class="lazyload" src="/home/static/picture/transparent.png" data-original="https://avatar.kuangxiangit.com/novel/img_index_recommend/carousel/20190412095658844.jpg" alt="">
						</a>
					</li>
										<li data-bg-src="https://avatar.kuangxiangit.com/novel/img_index_recommend/carousel/20190412031042871.jpg">
						<a target="_blank" href="#/book/100096189" target="_blank">
							<img class="lazyload" src="/home/static/picture/transparent.png" data-original="https://avatar.kuangxiangit.com/novel/img_index_recommend/carousel/20190412031110628.jpg" alt="">
						</a>
					</li>
										<li data-bg-src="https://avatar.kuangxiangit.com/novel/img_index_recommend/carousel/20190412031002360.jpg">
						<a target="_blank" href="#/book/100095238" target="_blank">
							<img class="lazyload" src="/home/static/picture/transparent.png" data-original="https://avatar.kuangxiangit.com/novel/img_index_recommend/carousel/20190412031021485.jpg" alt="">
						</a>
					</li>
										<li data-bg-src="https://avatar.kuangxiangit.com/novel/img_index_recommend/carousel/20190412030900664.jpg">
						<a target="_blank" href="#/book/100097410" target="_blank">
							<img class="lazyload" src="/home/static/picture/transparent.png" data-original="https://avatar.kuangxiangit.com/novel/img_index_recommend/carousel/20190412030909552.jpg" alt="">
						</a>
					</li>
										<li data-bg-src="https://avatar.kuangxiangit.com/novel/img_index_recommend/carousel/20190412030825712.jpg">
						<a target="_blank" href="#/book/100097119" target="_blank">
							<img class="lazyload" src="/home/static/picture/transparent.png" data-original="https://avatar.kuangxiangit.com/novel/img_index_recommend/carousel/20190412030834341.jpg" alt="">
						</a>
					</li>
										<li data-bg-src="https://avatar.kuangxiangit.com/novel/img_index_recommend/carousel/20190215103140665.jpg">
						<a target="_blank" href="#/activity/gufeng_zhengwen" target="_blank">
							<img class="lazyload" src="/home/static/picture/transparent.png" data-original="https://avatar.kuangxiangit.com/novel/img_index_recommend/carousel/20190215103210609.jpg" alt="">
						</a>
					</li>
										<li data-bg-src="https://avatar.kuangxiangit.com/novel/img_index_recommend/carousel/20190301073418751.jpg">
						<a target="_blank" href="#/book/booklist_detail?list_id=12055" target="_blank">
							<img class="lazyload" src="/home/static/picture/transparent.png" data-original="https://avatar.kuangxiangit.com/novel/img_index_recommend/carousel/20190301073429442.jpg" alt="">
						</a>
					</li>
					                    				</ul>
			</div>
			<div class="news">
                <h3 class="tit">最新活动 <a target="_blank" class="btn btn-more ly-fr" href="#/index/get_activity_list">更多 &gt;</a></h3>
				<ul>               
                    <!--<li><a target="_blank" href="" title="[征文]刺猬猫阅读IP征文大赛"><span>[征文]</span>刺猬猫阅读IP征文大赛</a></li>-->
                    <li><a href="#/index/fuli" title="2018 刺猬猫 作者福利">2018 刺猬猫 作者福利<i class="icon icon-recommend"></i></a></li>
                    					                    <li><a target="_blank" href="#/activity/publicity_19_mar?type=app" title="猫娘百科—10-4！间接接触">猫娘百科—10-4！间接接触</a></li>
					                    <li><a target="_blank" href="#/activity/moonlight_zhengwen_result" title="月圆之夜同人征文大赛获奖作品公布">月圆之夜同人征文大赛获奖作品公布</a></li>
					                    <li><a target="_blank" href="#/activity/publicity_19_feb" title="猫娘百科—欧皇宿主养成计划">猫娘百科—欧皇宿主养成计划</a></li>
					                    <li><a target="_blank" href="#/activity/gufeng_zhengwen" title="刺猬猫阅读，国风征文大赛">刺猬猫阅读，国风征文大赛</a></li>
					                    <li><a target="_blank" href="#/activity/new_year_festival?type=app&module=1" title="己亥猪年新春活动">己亥猪年新春活动</a></li>
					                    <li><a target="_blank" href="#/activity/publicity_eleventh" title="猫娘百科—魔王逃婚日记">猫娘百科—魔王逃婚日记</a></li>
					                    <li><a target="_blank" href="#/activity/ip_zhengwen_final_winner_list" title="刺猬猫阅读 | IP征文改编作品公布！">刺猬猫阅读 | IP征文改编作品公布！</a></li>
					                    <li><a target="_blank" href="#/activity/moonlight_zhengwen" title="月圆之夜主题同人征文大赛">月圆之夜主题同人征文大赛</a></li>
									</ul>
			</div>
		</div>
</div>
<div class="container">
    <div class="ly-wrap">
	<!--content-box zhaiwen start-->
        <div class="content-box">
            <div class="mod-box">
                                <div class="mod-tit">
                        <h3 class="icon-zhai">宅文推荐                        <sub>200位宅文大神鼎力打造</sub>
                        <a class="btn btn-more ly-fr" href="#/book_list">更多 &gt;</a></h3>
                </div>
                <div class="mod-body">
                        <div class="slider-wrap fl">
                                <div id="carousel" class="carousel">
                                        <div class="slides">
                                                                                            <div class="slideItem item1">
                                                        <a class="img" href="#/book/100096619" target="_blank">
                                                                <img class="lazyload" src="/home/static/picture/transparent.png" data-original="/home/static/images/16-03-19130118-88986-100096619.jpg" title="假面骑士Chaos的旅程" alt="假面骑士Chaos的旅程">
                                                                                                                        </a>
                                                </div>
                                                                                             <div class="slideItem item2">
                                                        <a class="img" href="#/book/100067469" target="_blank">
                                                                <img class="lazyload" src="/home/static/picture/transparent.png" data-original="/home/static/images/13-03-19195820-93991-100067469.jpg" title="我在日本当程序员" alt="我在日本当程序员">
                                                                                                                        </a>
                                                </div>
                                                                                             <div class="slideItem item3">
                                                        <a class="img" href="#/book/100099859" target="_blank">
                                                                <img class="lazyload" src="/home/static/picture/transparent.png" data-original="/home/static/images/22-03-19235756-74928-100099859.jpg" title="一介说书人" alt="一介说书人">
                                                                                                                        </a>
                                                </div>
                                                                                             <div class="slideItem item4">
                                                        <a class="img" href="#/book/100085408" target="_blank">
                                                                <img class="lazyload" src="/home/static/picture/transparent.png" data-original="/home/static/images/18-11-18121210-51618.jpg" title="我的前女友们" alt="我的前女友们">
                                                                                                                        </a>
                                                </div>
                                                                                             <div class="slideItem item5">
                                                        <a class="img" href="#/book/100093416" target="_blank">
                                                                <img class="lazyload" src="/home/static/picture/transparent.png" data-original="/home/static/images/31-01-19215658-52341.jpg" title="从零开始的巴萨辛生活" alt="从零开始的巴萨辛生活">
                                                                                                                        </a>
                                                </div>
                                                                                             <div class="slideItem item6">
                                                        <a class="img" href="#/book/100098747" target="_blank">
                                                                <img class="lazyload" src="/home/static/picture/transparent.png" data-original="/home/static/images/12-03-19102647-32024-100098747.jpg" title="听说历史的车轮想碾我" alt="听说历史的车轮想碾我">
                                                                                                                        </a>
                                                </div>
                                                                                             <div class="slideItem item7">
                                                        <a class="img" href="#/book/100101316" target="_blank">
                                                                <img class="lazyload" src="/home/static/picture/transparent.png" data-original="/home/static/images/01-04-19045300-35582.jpg" title="魅力点满的我难道只能吃软饭吗？" alt="魅力点满的我难道只能吃软饭吗？">
                                                                                                                        </a>
                                                </div>
                                                
                                        </div>
                                        <div class="description">
                                        			
                                                <div class="desc-wrap">
                                                        <h3><a href="#/book/100096619" target="_blank" title="假面骑士Chaos的旅程">假面骑士Chaos的旅程</a></h3>
                                                        <p class="author"><a target="_blank" href="#/reader/4960891">我永远喜欢夏娜</a> 著</p>
                                                        
                                                        <p class="desc">总而言之，主角是e总他弟（滑稽）当前世界：漆黑的子弹。”恐惧不近你身，骄傲与勇气将一直伴随着你。“”我的计划需要你，说出你的选择吧。“”既然如此，那么答案只有一个，那就是向你献上忠诚！“”人类，你们究竟要伤害自己的同胞到何种程度才甘心啊！！“”吞噬吧，黑洞啊，毁灭这个星球！！“</p>
                                                        <a class="btn btn-warning btn-md" href="#/book/100096619" target="_blank">书籍详情</a>
                                                </div>
                                                	
                                                <div class="desc-wrap">
                                                        <h3><a href="#/book/100067469" target="_blank" title="我在日本当程序员">我在日本当程序员</a></h3>
                                                        <p class="author"><a target="_blank" href="#/reader/199434">某中二的写作之旅</a> 著</p>
                                                        
                                                        <p class="desc">一个程序员养女儿的故事！本以为大家都是程序员很苦逼的！但是有一个同事的妹妹是美少女---叫做小埋！另一个同事小林家里还有cosplay的龙女仆。幸好自己还有一个萌哒哒的小女儿，可是为什么总是习惯干点坑爹的事，说着什么系统···</p>
                                                        <a class="btn btn-warning btn-md" href="#/book/100067469" target="_blank">书籍详情</a>
                                                </div>
                                                	
                                                <div class="desc-wrap">
                                                        <h3><a href="#/book/100099859" target="_blank" title="一介说书人">一介说书人</a></h3>
                                                        <p class="author"><a target="_blank" href="#/reader/2700819">惰天使</a> 著</p>
                                                        
                                                        <p class="desc">这是一本书。啪！武侠？玄幻？种田？魔幻？科幻？醒木一拍，折扇轻摇。“各位看官，且听我细细道来……”</p>
                                                        <a class="btn btn-warning btn-md" href="#/book/100099859" target="_blank">书籍详情</a>
                                                </div>
                                                	
                                                <div class="desc-wrap">
                                                        <h3><a href="#/book/100085408" target="_blank" title="我的前女友们">我的前女友们</a></h3>
                                                        <p class="author"><a target="_blank" href="#/reader/4210120">我们的幻想乡</a> 著</p>
                                                        
                                                        <p class="desc">不知何时被困在无止境的轮回中的少年周防阳，为了不让自己失去活下去的动力，给自己立了几个小目标，将学校里几个漂亮女生都追到手！就如同玩galgame一样，不同的轮回里攻略着不同的女生，反正新的轮回里她们什么也不记得了，周防阳本来是这样认为的...直到当事人们，他的“前女友”们带着记忆找上门一同找上门的时候...哦豁，完蛋。宝多六花（叹气）：这算什么啊，你把我当成什么了？玩具吗？英梨梨（恼火）：喂！你这家伙不会打算不负责任吧？三日月未来（古怪）：不愧是你呢，阳君。玛利亚（拿起洛阳）：呵呵。桐须真冬（冷漠）：掀了我的裙子，就要做好给我打扫卫生的准备。周防天音（诧异）：我这一堆弟妹是怎么回事儿？弟弟，你不是说好的不找女朋友吗？群785744160</p>
                                                        <a class="btn btn-warning btn-md" href="#/book/100085408" target="_blank">书籍详情</a>
                                                </div>
                                                	
                                                <div class="desc-wrap">
                                                        <h3><a href="#/book/100093416" target="_blank" title="从零开始的巴萨辛生活">从零开始的巴萨辛生活</a></h3>
                                                        <p class="author"><a target="_blank" href="#/reader/1641697">花糖nafu</a> 著</p>
                                                        
                                                        <p class="desc">我们的先辈留下这样一句话：“要啥没啥，爱咋咋地；抹黑干活，伺候那光。”纳兹莱尔庄园的大家都知道，伊斯有三个爱好：吃饭，砍人，吃饱了砍人。“哼，异世界又如何，敢打扰我修（chi）行（fan）的，就算是神也杀给你看！”读者群：884125196</p>
                                                        <a class="btn btn-warning btn-md" href="#/book/100093416" target="_blank">书籍详情</a>
                                                </div>
                                                	
                                                <div class="desc-wrap">
                                                        <h3><a href="#/book/100098747" target="_blank" title="听说历史的车轮想碾我">听说历史的车轮想碾我</a></h3>
                                                        <p class="author"><a target="_blank" href="#/reader/188785">天关客星</a> 著</p>
                                                        
                                                        <p class="desc">这里是个玄幻位面。但是，司维越看，越觉得剧本不太对。民众苦不堪言，百姓的家人都一样。在西凉作战的士兵，他们的妹妹要卖身士族来换饭吃；老农种出来的米，自己也吃不到；百姓辛勤工作，也得捱饥抵饿，忍受士族的欺压，疲惫不堪。皇帝居然是个弱智，身边的士族门阀还对他隐瞒百姓的苦况，隐瞒北方五部魔族的威胁，隐瞒真实国情。我看这九州，是药丸啊！这样下去，八王……五胡……历史的车轮就要碾过来啦！身处于这个腐败的时代，司维的热血沸腾起来了。他能做的只有……听说历史的车轮要碾我？拆！</p>
                                                        <a class="btn btn-warning btn-md" href="#/book/100098747" target="_blank">书籍详情</a>
                                                </div>
                                                	
                                                <div class="desc-wrap">
                                                        <h3><a href="#/book/100101316" target="_blank" title="魅力点满的我难道只能吃软饭吗？">魅力点满的我难道只能吃软饭吗？</a></h3>
                                                        <p class="author"><a target="_blank" href="#/reader/5101321">这不是夏天</a> 著</p>
                                                        
                                                        <p class="desc">本书有次《这个圣女有点怪》，《我不帅，请不要给我钱》，《圣女废柴养成记》求月票，推荐票，收藏，非常感谢，（本书已签约请放心食用。）圣女：晓翎大人，您走路的样子真性感，我能给您钱吗？我：？？？就算你这么说，我也要去工作，绝不当小白脸！！圣女：我很有钱，又很漂亮，不如……我：恕我拒绝</p>
                                                        <a class="btn btn-warning btn-md" href="#/book/100101316" target="_blank">书籍详情</a>
                                                </div>
                                                                                        </div>
                                </div>
                        </div>
                        <ul class="book-list book-list-one">
                                                            <li>
                                        <a class="img" href="#/book/100094431" target="_blank"><img class="lazyload" src="/home/static/picture/transparent.png" data-original="/home/static/images/23-02-19223415-49029-100094431.jpg" title="我，时崎狂三，是个漫游" alt="我，时崎狂三，是个漫游"></a>
                                        <div class="info">
                                                <h3 class="title"><a href="#/book/100094431" title="我，时崎狂三，是个漫游" target="_blank">我，时崎狂三，是个漫游</a></h3>
                                                <p class="author"><a target="_blank" href="#/reader/4421301">少女恋上姐姐</a></p>
                                                <p class="desc">重生成了时崎狂三？还带着一身增幅12的孤儿套和普雷装？嚯嚯，已经没有什么好怕的了。再见了，崇宫澪。——少女清冽的眸里满是嘲弄。“为什么...这是为什么！”“因为，我是心悦三啊~”“啊哈？？？”——叮——初始副本已通关，正在评价中。时崎狂三：？？？这是一个重生的少女顺路拯救世界的故事。···世界：四战-甲铁城-弑神者？群名最强惹不起の世界群号：674394917</p>
                                                <a class="btn-read" href="#/book/100094431">立即阅读</a>
                                        </div>
                                </li>
                                                            <li>
                                        <a class="img" href="#/book/100082905" target="_blank"><img class="lazyload" src="/home/static/picture/transparent.png" data-original="/home/static/images/14-01-19181554-51500-100082905.jpg" title="面具后的龙骑士" alt="面具后的龙骑士"></a>
                                        <div class="info">
                                                <h3 class="title"><a href="#/book/100082905" title="面具后的龙骑士" target="_blank">面具后的龙骑士</a></h3>
                                                <p class="author"><a target="_blank" href="#/reader/1368693">献诗湿人</a></p>
                                                <p class="desc">连自己都搞不清楚自己是从哪里来的纱豆稀里糊涂地继承了面具之主的使命，告别了自己的“老爹”，和自己的两个小伙伴踏上了征途。他曾经也认为自己是为了恢复万神荣光而战的面具之主，直到面具被破碎之后，他才发现原来自己注定是为她而战的龙骑士！这是一个男人凄苦地在神话的阴影中前行最后破碎神话的故事。（本书慢热，大家多多包涵）</p>
                                                <a class="btn-read" href="#/book/100082905">立即阅读</a>
                                        </div>
                                </li>
                                                            <li>
                                        <a class="img" href="#/book/100098348" target="_blank"><img class="lazyload" src="/home/static/picture/transparent.png" data-original="/home/static/images/11-03-19170527-30982-100098348.jpg" title="我在日本养女鬼" alt="我在日本养女鬼"></a>
                                        <div class="info">
                                                <h3 class="title"><a href="#/book/100098348" title="我在日本养女鬼" target="_blank">我在日本养女鬼</a></h3>
                                                <p class="author"><a target="_blank" href="#/reader/1784625">银闪闪</a></p>
                                                <p class="desc">本书又名《以崩坏3的方式养成女鬼》与《五等分的女鬼》《女鬼不可能这么萌》某一天里萧晓的手机里的崩坏三突然变成了养成女鬼游戏，他的家也被装修成了一艘鬼舰船，在灵异事件多起来的世界，萧晓毅然决然的决定，走上捕捉女鬼，养成女鬼的道路……整个世界的秘密也在萧晓一步步探索的过程中缓慢的揭开了....萧晓：养成女鬼是不可能养成的，这辈子都不可能养成的.....emmm，女鬼真可爱.....简介无力，正片为主，写了千万字作者，质量保证....大概....每日5000字左右，尽管催更，多更一章算我输</p>
                                                <a class="btn-read" href="#/book/100098348">立即阅读</a>
                                        </div>
                                </li>
                                                    </ul>
                </div>
                            </div>
            <!--content-box 右侧 周点击榜 start-->
                        <div class="recommend-box ly-fr">
                    <div class="title-box icon-book">
                            <h3 class="title">周点击榜</h3>
                            <p class="sub-title">我要的次元</p>
                            <a class="btn btn-more" href="#/rank-index/no-vip-click" target="_blank">更多 &gt;</a>
                    </div>
                    <ul>
                                                    <li class="top1">
                                <div class="info">
                                  <i class="icon-top">NO.1</i>
                                  <h3><a href="#/book/100100123" target="_blank" title="月世界必不可能成为网游">月世界必不可能成为网游</a></h3>
                                  <p class="author"><a target="_blank" href="#/reader/5073920">活版印刷</a></p>
                                  <p class="num"><span>139.1万</span>点击</p>
                                </div>
                                <a class="img" href="#/book/100100123" title="月世界必不可能成为网游"><img class="lazyload" src="/home/static/picture/transparent.png" data-original="/home/static/images/09-04-19211539-69452-100100123.jpg" alt="月世界必不可能成为网游"></a>
                              </li>
                                                            <li class="top">
                                  <a href="#/book/100100050" target="_blank" title="从只狼开始">
                                    <i class="icon-top">2</i><b>[游戏世界]</b>从只狼开始                                    <span class="num">90.8万</span>
                                  </a>
                                </li>
                                                                <li >
                                  <a href="#/book/100098843" target="_blank" title="垃圾主角，我上我也行！">
                                    <i class="icon-top">3</i><b>[动漫穿越]</b>垃圾主角，我上我也行！                                    <span class="num">62.3万</span>
                                  </a>
                                </li>
                                                                <li >
                                  <a href="#/book/100101625" target="_blank" title="我和雪之下双胞胎">
                                    <i class="icon-top">4</i><b>[青春日常]</b>我和雪之下双胞胎                                    <span class="num">59.1万</span>
                                  </a>
                                </li>
                                                                <li >
                                  <a href="#/book/100100949" target="_blank" title="当天界人降临二次元">
                                    <i class="icon-top">5</i><b>[动漫穿越]</b>当天界人降临二次元                                    <span class="num">58.1万</span>
                                  </a>
                                </li>
                                                                <li >
                                  <a href="#/book/100098356" target="_blank" title="文明：超越两界">
                                    <i class="icon-top">6</i><b>[异界幻想]</b>文明：超越两界                                    <span class="num">56.4万</span>
                                  </a>
                                </li>
                                                                <li >
                                  <a href="#/book/100098735" target="_blank" title="想个办法吃师妹软饭">
                                    <i class="icon-top">7</i><b>[异界幻想]</b>想个办法吃师妹软饭                                    <span class="num">55.6万</span>
                                  </a>
                                </li>
                                                                <li >
                                  <a href="#/book/100098687" target="_blank" title="政法系的比企谷八幡">
                                    <i class="icon-top">8</i><b>[青春日常]</b>政法系的比企谷八幡                                    <span class="num">49.0万</span>
                                  </a>
                                </li>
                                                                <li >
                                  <a href="#/book/100096897" target="_blank" title="我当初就不该玩女号">
                                    <i class="icon-top">9</i><b>[游戏世界]</b>我当初就不该玩女号                                    <span class="num">47.3万</span>
                                  </a>
                                </li>
                                                                <li >
                                  <a href="#/book/100097979" target="_blank" title="防火女啊，这个人值得一烧">
                                    <i class="icon-top">10</i><b>[动漫穿越]</b>防火女啊，这个人值得一烧                                    <span class="num">40.2万</span>
                                  </a>
                                </li>
                                                    </ul>
            </div>
                        <!--画风不一样 -->
                        <div class="banner banner-single">
                    <a href="http://www.ciweimao.com/book/booklist_detail?list_id=14995" target="_blank" title="自用书单">
                            <img class="lazyload" src="/home/static/picture/transparent.png" data-original="https://avatar.kuangxiangit.com/novel/img_index_recommend/booklist/20190325104832101.jpg" alt="">
                    </a>
            </div>
                    </div>    
        <!--content-box zhaiwen end-->
        
        <!--content-box zongman start-->
        <div class="content-box">
				<div class="mod-box">
                                    					<div class="mod-tit">
						<h3 class="icon-zong">综漫推荐<sub>万人在线抢着看</sub><a class="btn btn-more ly-fr" href="#/book_list">更多 &gt;</a></h3>
					</div>
					<div class="mod-body">
						<ul class="book-list book-list-two">
                                                    						<li>
							<a class="img" href="#/book/100094403" target="_blank">
								<img class="lazyload" src="/home/static/picture/cover.jpg" data-original="/home/static/images/09-02-19204810-72254.jpg" alt="漫威世界的阴阳师">
								<div class="mask"></div>
								<div class="info">
									<div class="tit"><img class="lazyload" src="/home/static/picture/avatar-default-m.png" data-original="https://avatar.kuangxiangit.com/novel/img-2017-02/32414/avatar/thumb_8a69e79999156357d8275944f786976e.jpg" alt="">【陌上花零】</div>
									<div class="desc">当许清明还在猪场嗷嗷待宰时，他心里还有很多很多问题得不到解答，比如犬神为什么总是背着一个房子，比如神秘商人为什么瞎了一只眼，又比如大舅的性别到底是♂还是♀……而在穿越重生到漫威世界后，一枚能用生物心里阴暗面的碎片召唤式神的奇妙勾玉，终于让许清明有了解开谜题的机会……“以勾玉命之！回答我，玉藻前，你到底是♂还是♀！”“……堕天！狐火！”</div>
									<div class="num">4323<i></i></div>
								</div>
							</a>
							<h3 class="title"><a href="#/book/100094403" title="漫威世界的阴阳师" target="_blank">漫威世界的阴阳师</a></h3>
							<p class="intro"><span>87.6万</span>︱<span>超现实都市</span></p>
						</li>
												<li>
							<a class="img" href="#/book/100099211" target="_blank">
								<img class="lazyload" src="/home/static/picture/cover.jpg" data-original="/home/static/images/15-03-19160136-92770-100099211.jpg" alt="当我穿越至替身横行的异世界？！">
								<div class="mask"></div>
								<div class="info">
									<div class="tit"><img class="lazyload" src="/home/static/picture/avatar-default-m.png" data-original="" alt="">【止止止止止】</div>
									<div class="desc">我叫卓勉。当我带着从24小时便利店里面买来的打折隔夜便当回家的时候，被从天而降的压路机砸中了。在我以为自己已经死了的时候，我发现自己竟然来到了一个奇异的世界，而且还觉醒了替身能力？！这里有一座用山脉般高耸的围墙保护起来的巨大都市。二十年前的吸血鬼战争？替身使者组建的组织？！潜伏在暗中的吸血鬼恐怖分子？SPW财团？！意大利黑手党？！等一下，请等一下！这到底是个什么鬼地方啊！</div>
									<div class="num">324<i></i></div>
								</div>
							</a>
							<h3 class="title"><a href="#/book/100099211" title="当我穿越至替身横行的异世界？！" target="_blank">当我穿越至替身横行的异世界？！</a></h3>
							<p class="intro"><span>6.9万</span>︱<span>动漫穿越</span></p>
						</li>
												<li>
							<a class="img" href="#/book/100085460" target="_blank">
								<img class="lazyload" src="/home/static/picture/cover.jpg" data-original="/home/static/images/18-11-18204139-73255-100085460.jpg" alt="假面骑士，使命必达！">
								<div class="mask"></div>
								<div class="info">
									<div class="tit"><img class="lazyload" src="/home/static/picture/avatar-default-m.png" data-original="https://avatar.kuangxiangit.com/novel/img-2019-01/60596/avatar/thumb_09349f8d6ca2629b83cc01b46d6d25b7.jpg" alt="">【伊吹瓢】</div>
									<div class="desc">儿时的我想成为英雄，因为我羡慕英雄的力量。后来我知道了，英雄并不好当，于是我放弃了成为所有人的英雄。我开始想当所爱之人的英雄。可直到有一天，我发现，我所爱的人太多了。过去的朋友，现在的朋友，未来的朋友。哪怕是今日才相识，哪怕是明日就要分离，我依旧热爱着这样的友人们。在不同世界中行走，与不同的人们相识相知，承载了愿望的少年始终是只身独影。但即便如此，当渴望拯救的声音响起时，假面骑士也必定会到来。“所以，请你看着吧，我的......变身！”假面骑士，使命必达！ps：主体能力树为假面骑士kuuga，行走的世界既会有骑士世界也会有其他作品。总得来说我也是个特摄选手，选择空我是因为他是我的第一部假面骑士，我会学习格斗技的原因也是因为儿时曾梦想成为会2000种技能的男人</div>
									<div class="num">10693<i></i></div>
								</div>
							</a>
							<h3 class="title"><a href="#/book/100085460" title="假面骑士，使命必达！" target="_blank">假面骑士，使命必达！</a></h3>
							<p class="intro"><span>540.0万</span>︱<span>动漫穿越</span></p>
						</li>
												<li>
							<a class="img" href="#/book/100069155" target="_blank">
								<img class="lazyload" src="/home/static/picture/cover.jpg" data-original="https://novel-cdn.kuangxiangit.com/uploads/allimg/c190322/22-03-19211610-74698-100069155.jpg" alt="不一样的传火之路">
								<div class="mask"></div>
								<div class="info">
									<div class="tit"><img class="lazyload" src="/home/static/picture/avatar-default-m.png" data-original="" alt="">【无可救药死宅男】</div>
									<div class="desc">随处可见的墓碑，蓝色斗篷下的苍白尸鬼，一次次的死亡，一次次的重生，看上去毫无变化，实际上到底在发生着什么？开局一棒槌，一破烂木盾，到底要怎么完成使命？（以黑魂为背景的穿越小说，关于黑魂的设定大多都是模糊不清的，除了宫崎老贼没有谁能肯定地判断设定。本书的设定很大一部分是各位大佬的解析，以及本人的脑补，有BUG的地方，可以别喷吗？）书友群号878797466，喜好魂学的朋友快来呀~</div>
									<div class="num">789<i></i></div>
								</div>
							</a>
							<h3 class="title"><a href="#/book/100069155" title="不一样的传火之路" target="_blank">不一样的传火之路</a></h3>
							<p class="intro"><span>26.6万</span>︱<span>游戏世界</span></p>
						</li>
												<li>
							<a class="img" href="#/book/100092709" target="_blank">
								<img class="lazyload" src="/home/static/picture/cover.jpg" data-original="https://novel-cdn.kuangxiangit.com/uploads/allimg/c190126/26-01-19115549-22069.jpg" alt="当一个打牌部被系统拉到游戏王世界">
								<div class="mask"></div>
								<div class="info">
									<div class="tit"><img class="lazyload" src="/home/static/picture/avatar-default-m.png" data-original="https://avatar.kuangxiangit.com/novel/img-2017-05/38932/avatar/thumb_977955a4fd381d2ec9af0e2a346041d5.jpg" alt="">【开黑车的王哈桑】</div>
									<div class="desc">书名我懒得想，如果有好的意见可以发在书评。这本书是本作者娱乐向作品，各位大佬看着开心就好。当5个人娱乐决斗者来到游戏王的世界，被告知是一个系统所为，不完成发布的任务的话，就会发生很可“啪”的事情。在不同的游戏王世界里，有着不同的规则。在游戏王第一部第二部里，不能使用任何超越这个时代的卡，调整卡禁止的！某些记载着超量同调链接的卡片也是禁止的。另外......“虫妹是我哒！我哒！虫惑魔世界第一可爱！”————老书以80w字正常完结，良心作者说的就是我，各位感兴趣的可以看看。</div>
									<div class="num">2502<i></i></div>
								</div>
							</a>
							<h3 class="title"><a href="#/book/100092709" title="当一个打牌部被系统拉到游戏王世界" target="_blank">当一个打牌部被系统拉到游戏王世界</a></h3>
							<p class="intro"><span>82.5万</span>︱<span>动漫穿越</span></p>
						</li>
												<li>
							<a class="img" href="#/book/100096994" target="_blank">
								<img class="lazyload" src="/home/static/picture/cover.jpg" data-original="https://novel-cdn.kuangxiangit.com/uploads/allimg/c190226/26-02-19184948-59504-100096994.jpg" alt="无限之我是电击使">
								<div class="mask"></div>
								<div class="info">
									<div class="tit"><img class="lazyload" src="/home/static/picture/avatar-default-m.png" data-original="https://avatar.kuangxiangit.com/novel/img-2018-02/56293/avatar/thumb_5b9ef29d20e4953e601c803cbd28f674.jpg" alt="">【上班de蜗牛】</div>
									<div class="desc">这是一个无限流的故事。主角在获得御坂美琴的电击使能力后，一步步领先别人，最终走上人生巅峰的故事。后宫不后宫的不知道，反正女主角肯定有。主要以动漫世界为主，游戏世界为辅。</div>
									<div class="num">385<i></i></div>
								</div>
							</a>
							<h3 class="title"><a href="#/book/100096994" title="无限之我是电击使" target="_blank">无限之我是电击使</a></h3>
							<p class="intro"><span>7.0万</span>︱<span>超现实都市</span></p>
						</li>
												<li>
							<a class="img" href="#/book/100094123" target="_blank">
								<img class="lazyload" src="/home/static/picture/cover.jpg" data-original="https://novel-cdn.kuangxiangit.com/uploads/allimg/c190208/08-02-19191300-86792-100094123.jpg" alt="遍地英灵的世界我带着式神在晃">
								<div class="mask"></div>
								<div class="info">
									<div class="tit"><img class="lazyload" src="/home/static/picture/avatar-default-m.png" data-original="https://avatar.kuangxiangit.com/novel/img-2019-02/2258417/avatar/thumb_2199c3f82f523453ecfcd15bd873d7cb.jpg" alt="">【纸片人老婆赛高!】</div>
									<div class="desc">（书友群:870721582）（作者标题党，女主是符华，女主是符华，女主是符华，重要的事情说三遍）“给我个机会，以前我没得选，现在，我只想做个普通人！”一名假面骑士带着萤草对着面对他的众人如是说到。本书又名《能吃软饭的我却在拼命变强》《这个世界真混乱》本书借用了fgo的升级设定之类的，但是和型月没什么关系本书与假面骑士，fgo，阴阳师的所有剧情都没有关系，本质上是个原型故事，里面不会涉及任何原著，不论是看过原著的还是没看过原著的，都可以放心食用</div>
									<div class="num">3946<i></i></div>
								</div>
							</a>
							<h3 class="title"><a href="#/book/100094123" title="遍地英灵的世界我带着式神在晃" target="_blank">遍地英灵的世界我带着式神在晃</a></h3>
							<p class="intro"><span>95.1万</span>︱<span>超现实都市</span></p>
						</li>
												<li>
							<a class="img" href="#/book/100092005" target="_blank">
								<img class="lazyload" src="/home/static/picture/cover.jpg" data-original="https://novel-cdn.kuangxiangit.com/uploads/allimg/c190208/08-02-19021227-63393-100092005.jpg" alt="十五岁，是假面骑士">
								<div class="mask"></div>
								<div class="info">
									<div class="tit"><img class="lazyload" src="/home/static/picture/avatar-default-m.png" data-original="https://avatar.kuangxiangit.com/novel/img-2019-03/4436712/avatar/thumb_8a9385f389dcded07c5c0a5d45945a77.jpg" alt="">【游学者秦心】</div>
									<div class="desc">莲是万能的！（指秋山莲）我超高校级的棒球手只想过平静的生活……11037（噔噔咚）讲述了精神有问题的医生主角与同伴共同战斗，消灭疾病、救助患者的热血故事（确信）从钻石中~绽放梦想~Perseus~（女人唱歌男人吃瘪）</div>
									<div class="num">1211<i></i></div>
								</div>
							</a>
							<h3 class="title"><a href="#/book/100092005" title="十五岁，是假面骑士" target="_blank">十五岁，是假面骑士</a></h3>
							<p class="intro"><span>29.7万</span>︱<span>超现实都市</span></p>
						</li>
												</ul>
					</div>
                                    				</div>
            
				<!--content-box 右侧 月票榜 start-->
                        <div class="recommend-box ly-fr">
                    <div class="title-box icon-book">
                            <h3 class="title">月票榜</h3>
                            <p class="sub-title">我要的次元</p>
                            <a class="btn btn-more" href="#/rank-index/yp" target="_blank">更多 &gt;</a>
                    </div>
                    <ul>
                                                    <li class="top1">
                                <div class="info">
                                  <i class="icon-top">NO.1</i>
                                  <h3><a href="#/book/100097305" target="_blank" title="无敌的我何须亲自动手">无敌的我何须亲自动手</a></h3>
                                  <p class="author"><a target="_blank" href="#/reader/4468290">挖坑必填神巫六</a></p>
                                  <p class="num"><span>7986</span></p>
                                </div>
                                <a class="img" href="#/book/100097305" title="无敌的我何须亲自动手"><img class="lazyload" src="/home/static/picture/transparent.png" data-original="https://novel-cdn.kuangxiangit.com/uploads/allimg/c190314/14-03-19101602-48519-100097305.jpg" alt="无敌的我何须亲自动手"></a>
                              </li>
                                                            <li class="top">
                                  <a href="#/book/100089784" target="_blank" title="全职业满级之后">
                                    <i class="icon-top">2</i><b>[异界幻想]</b>全职业满级之后                                    <span class="num">6635</span>
                                  </a>
                                </li>
                                                                <li >
                                  <a href="#/book/100098356" target="_blank" title="文明：超越两界">
                                    <i class="icon-top">3</i><b>[异界幻想]</b>文明：超越两界                                    <span class="num">5486</span>
                                  </a>
                                </li>
                                                                <li >
                                  <a href="#/book/100097315" target="_blank" title="女友全都是厉鬼">
                                    <i class="icon-top">4</i><b>[超现实都市]</b>女友全都是厉鬼                                    <span class="num">4468</span>
                                  </a>
                                </li>
                                                                <li >
                                  <a href="#/book/100100123" target="_blank" title="月世界必不可能成为网游">
                                    <i class="icon-top">5</i><b>[游戏世界]</b>月世界必不可能成为网游                                    <span class="num">2802</span>
                                  </a>
                                </li>
                                                                <li >
                                  <a href="#/book/100092758" target="_blank" title="全世界都在针对我">
                                    <i class="icon-top">6</i><b>[动漫穿越]</b>全世界都在针对我                                    <span class="num">2471</span>
                                  </a>
                                </li>
                                                                <li >
                                  <a href="#/book/100096867" target="_blank" title="奴隶养成计划">
                                    <i class="icon-top">7</i><b>[异界幻想]</b>奴隶养成计划                                    <span class="num">1502</span>
                                  </a>
                                </li>
                                                                <li >
                                  <a href="#/book/100087417" target="_blank" title="我用英灵卡组在决斗者王国打牌">
                                    <i class="icon-top">8</i><b>[动漫穿越]</b>我用英灵卡组在决斗者王国打牌                                    <span class="num">1491</span>
                                  </a>
                                </li>
                                                                <li >
                                  <a href="#/book/100098816" target="_blank" title="不如我们分了他吧">
                                    <i class="icon-top">9</i><b>[青春日常]</b>不如我们分了他吧                                    <span class="num">1335</span>
                                  </a>
                                </li>
                                                                <li >
                                  <a href="#/book/100097319" target="_blank" title="跨越死亡的界限">
                                    <i class="icon-top">10</i><b>[动漫穿越]</b>跨越死亡的界限                                    <span class="num">1284</span>
                                  </a>
                                </li>
                                                    </ul>
            </div>
                                        <!--书荒看这里 -->
				<div class="banner banner-single">
					<a href="http://www.ciweimao.com/book/booklist_detail?list_id=12055" target="_blank" title="书荒看这里4">
						<img class="lazyload" src="/home/static/picture/transparent.png" data-original="https://avatar.kuangxiangit.com/novel/img_index_recommend/booklist/20190325105100248.jpg" alt="">
					</a>
				</div>
            			</div>
        
        <!--BOSS任性推 start-->            
        <div class="content-box">
                <div class="mod-box">
                                            <div class="mod-tit">
                            <h3 class="icon-boss">BOSS任性推荐<sub>万人在线抢着看</sub><a target="_blank" class="btn btn-more ly-fr" href="#/book_list">更多 &gt;</a></h3>
                        </div>
                        <ul class="book-list book-list-three">
                                                            <li>
                                        <a class="img" href="#/book/100092129" target="_blank">
                                                <img class="lazyload" src="/home/static/picture/cover.jpg" data-original="https://novel-cdn.kuangxiangit.com/uploads/allimg/c190122/22-01-19111011-65508-100092129.jpg" alt="怎么突然群穿了">
                                                <div class="mask"></div>
                                                <div class="info">
                                                        <div class="tit"><img class="lazyload" src="/home/static/picture/avatar-default-m.png" data-original="" alt="">【九张机】</div>
                                                        <div class="desc">（书友QQ群：941459822，持续五更中~~~~）这个世界的谜题很多……祥瑞御免？天诛八尺？李菊福？中法之战，法军舰队为何在马江之内折戟沉沙？（法国：你丫给王二雷充钱了吧混蛋！）甲午战场，日军为何横遭坦克碾压?（日本：这TM分房机制有问题吧混蛋？！）沉没的敌军舰队为何变为舰娘？（舰娘：我可是你们惹不起的啊喂！）为什么这个世界里的一分钟只有59秒？（我有一首诗，不知当讲不当讲……）这个世界究竟怎么了?这一切的一切究竟是道德的沦丧还是人性的泯灭?这一切的起源，还要从那艘不管闲事儿就会死星人的飞船说起……朋友们，武装好你的嘴炮，准备好你的键盘!我们一起到这个世界里走一遭~</div>
                                                        <div class="num">4407<i></i></div>
                                                </div>
                                        </a>
                                        <h3 class="title"><a href="#/book/100092129" title="怎么突然群穿了" target="_blank">怎么突然群穿了</a></h3>
                                        <p class="intro"><span>206.3万</span>︱<span>战争历史</span></p>
                                </li>
                                                                <li>
                                        <a class="img" href="#/book/100094119" target="_blank">
                                                <img class="lazyload" src="/home/static/picture/cover.jpg" data-original="https://novel-cdn.kuangxiangit.com/uploads/allimg/c190208/08-02-19031049-25058-100094119.jpg" alt="露营少女也要逆转未来">
                                                <div class="mask"></div>
                                                <div class="info">
                                                        <div class="tit"><img class="lazyload" src="/home/static/picture/avatar-default-m.png" data-original="" alt="">【月刊少女桐子姬】</div>
                                                        <div class="desc">2025年11月5日，时任日本山梨县刑警的志摩凛小姐，正用布满血丝的双眼，注视着手中属于高中时代的友人们的遗像，默然不语。2018年11月5日，刚刚完成了一次户外露营活动的本栖高中一年级生志摩凛，正站在爷爷的书房门口，目不转睛地注视着，书桌上那部堪称古董级别的无线电台。中午12:00，在相隔七年的两个时空中，【无线电台】在“同一时刻”，响起了“滋滋”的电流杂声。（摇曳露营△同人，但即使没有看过原作的读者，也可以放心阅读）暗黑剧情向，基调偏严肃，不喜者勿入。*本书百合。</div>
                                                        <div class="num">608<i></i></div>
                                                </div>
                                        </a>
                                        <h3 class="title"><a href="#/book/100094119" title="露营少女也要逆转未来" target="_blank">露营少女也要逆转未来</a></h3>
                                        <p class="intro"><span>7.9万</span>︱<span>超现实都市</span></p>
                                </li>
                                                                <li>
                                        <a class="img" href="#/book/100069411" target="_blank">
                                                <img class="lazyload" src="/home/static/picture/cover.jpg" data-original="https://novel-cdn.kuangxiangit.com/uploads/allimg/c180721/21-07-18055134-39722-100069411.jpg" alt="综漫里的fgo玩家">
                                                <div class="mask"></div>
                                                <div class="info">
                                                        <div class="tit"><img class="lazyload" src="/home/static/picture/avatar-default-m.png" data-original="https://avatar.kuangxiangit.com/novel/img-2018-12/463742/avatar/thumb_30505786f091572c2020bc85f865fd31.jpg" alt="">【雪夜长歌】</div>
                                                        <div class="desc">我，楚雨。人民警察，调查掏心魔一案时莫名其妙的被卷入了御卡者的斗争中。然后我gg了。现在我带着fgo的卡盒穿越了。要收集散落在各个动漫世界的卡牌才能回地球。金手指挺强的，就是我有点懵逼。我没看过动漫也没玩过fgo。现在出售穿越者名额还来得及嘛？在线等，挺急的。</div>
                                                        <div class="num">4891<i></i></div>
                                                </div>
                                        </a>
                                        <h3 class="title"><a href="#/book/100069411" title="综漫里的fgo玩家" target="_blank">综漫里的fgo玩家</a></h3>
                                        <p class="intro"><span>209.5万</span>︱<span>动漫穿越</span></p>
                                </li>
                                                                <li>
                                        <a class="img" href="#/book/100097266" target="_blank">
                                                <img class="lazyload" src="/home/static/picture/cover.jpg" data-original="https://novel-cdn.kuangxiangit.com/uploads/allimg/c190228/28-02-19212318-24258.jpg" alt="我的文明是不是长歪了">
                                                <div class="mask"></div>
                                                <div class="info">
                                                        <div class="tit"><img class="lazyload" src="/home/static/picture/avatar-default-m.png" data-original="https://avatar.kuangxiangit.com/novel/img-2018-03/3146497/avatar/thumb_4e266d654a33dc114b89d7b6d11d6aac.jpg" alt="">【懒洋洋的某麟】</div>
                                                        <div class="desc">变成阿赖耶的某人才发现人类居然还是原始人，而这时候盖亚却异常强大，还总是喜欢欺负他，为了反扑回去，某人立志要引导人类文明进入星辰大海，彻底摆脱盖亚的制约！可是明明是教原始人们生火，那些野生动物怎么也学会了？！还有，生火怎么能打个响指就冒出来啊！嗯~通过摩擦产热来点燃火种，很科学，可是你手指没受半点伤就很不科学了！！什么！打响指都不能满足你们了？！你们还要手搓火球？天啊，我的文明是不是长歪了？！</div>
                                                        <div class="num">680<i></i></div>
                                                </div>
                                        </a>
                                        <h3 class="title"><a href="#/book/100097266" title="我的文明是不是长歪了" target="_blank">我的文明是不是长歪了</a></h3>
                                        <p class="intro"><span>11.3万</span>︱<span>神秘未知</span></p>
                                </li>
                                                                <li>
                                        <a class="img" href="#/book/100099366" target="_blank">
                                                <img class="lazyload" src="/home/static/picture/cover.jpg" data-original="https://novel-cdn.kuangxiangit.com/uploads/allimg/c190328/28-03-19153943-76625-100099366.jpg" alt="多等份的青春恋爱物语果然有问题">
                                                <div class="mask"></div>
                                                <div class="info">
                                                        <div class="tit"><img class="lazyload" src="/home/static/picture/avatar-default-m.png" data-original="" alt="">【一米八三的大鸽子】</div>
                                                        <div class="desc">一个身体里潜藏着另一个人格的黑崎浅原，因为精神问题，精神不能继续受到刺激，回归学院想过上平凡生活的他，入住樱花庄开始新的生活。樱花庄里住着五个古灵精怪的五胞胎、外表冰冷、内心温柔的雪之下雪乃、天然呆、没有一点自理能力的椎名真白以及那个与他在囚牢……青梅竹马，与女神们同居在一起的他，没过多久的时间，被分了！对，就这样，被女神们分成很多份！求收藏，求推荐，求打赏（更新稳定，每日两更）本书涉及：五等分、青春恋爱物语、樱花庄书友群：794500299</div>
                                                        <div class="num">1847<i></i></div>
                                                </div>
                                        </a>
                                        <h3 class="title"><a href="#/book/100099366" title="多等份的青春恋爱物语果然有问题" target="_blank">多等份的青春恋爱物语果然有问题</a></h3>
                                        <p class="intro"><span>28.3万</span>︱<span>青春日常</span></p>
                                </li>
                                                                <li>
                                        <a class="img" href="#/book/100066061" target="_blank">
                                                <img class="lazyload" src="/home/static/picture/cover.jpg" data-original="https://novel-cdn.kuangxiangit.com/uploads/allimg/c180502/02-05-18121443-80424-100066061.jpg" alt="新伊甸沉浮录（EVE国服历史演义）">
                                                <div class="mask"></div>
                                                <div class="info">
                                                        <div class="tit"><img class="lazyload" src="/home/static/picture/avatar-default-m.png" data-original="https://avatar.kuangxiangit.com/novel/img-2018-05/3170182/avatar/thumb_209815d3dd3dee122898c24046042a86.jpg" alt="">【蓝莓蓝魅】</div>
                                                        <div class="desc">我们见证了最庞大的帝国，也见证了帝国在血腥的内战中分裂而消逝。我们见证了最桀骜不驯的反抗者，以坚强的意志席卷了全宇宙，也见证了他们急速的腐化与堕落。被赶出家园的丧家之犬们，用1715天走完了复仇之路，重现了昔日的辉煌。还没能有时间好好怀念一下当年，新的内战阴影，却又再一次笼罩了新伊甸宇宙。历史，承载着无数的曲折与悲欢。今天，我想请你一起来见证，这片星海中，曾经埋藏着的故事。（专注于势力兴衰起落沉浮的太空歌剧。基于真实故事改编。）</div>
                                                        <div class="num">1838<i></i></div>
                                                </div>
                                        </a>
                                        <h3 class="title"><a href="#/book/100066061" title="新伊甸沉浮录（EVE国服历史演义）" target="_blank">新伊甸沉浮录（EVE国服历史演义）</a></h3>
                                        <p class="intro"><span>40.1万</span>︱<span>游戏世界</span></p>
                                </li>
                                                        </ul>
                                    </div>
            <!--往期Boss推荐 start-->            
                            <div class="recommend-box ly-fr">
                        <div class="title-box icon-past">
                                <h3 class="title">往期BOSS推荐</h3>
                                <p class="sub-title">总裁的秘密书库</p>
                                <!--<a class="btn btn-more" href="">更多 &gt;</a>-->
                        </div>
                        <ul class="recommend-list-three">
                        <li class="top">
                                <a href="#/book/100089991" target="_blank" title="天下第一是花魁">
                                        <i class="icon-top">1</i><b>[异界幻想]</b>天下第一是花魁                                        <span class="num">109.8万</span>
                                </a>
                        </li>
                                                <li class="top">
                            <a href="#/book/100100549" target="_blank" title="关于魔宗宗主转生为赘婿的那件事">
                                <i class="icon-top icon-top2">2</i><b>[异界幻想]</b>关于魔宗宗主转生为赘婿的那件事                                <span class="num">1.0万</span>
                            </a>
                        </li>
                                                <li class="top">
                            <a href="/book/100081641" target="_blank" title="嫁人王子逃婚记">
                                <i class="icon-top icon-top3">3</i><b>[异界幻想]</b>嫁人王子逃婚记                                <span class="num">464.3万</span>
                            </a>
                        </li>
                                                <li>
                            <a href="https://www.ciweimao.com/book/100027886" target="_blank" title="主神的猥琐继承人">
                                <i class="icon-top">4</i><b>[超现实都市]</b>主神的猥琐继承人                                <span class="num">1,814.8万</span>
                            </a>
                        </li>
                                                <li>
                            <a href="https://www.ciweimao.com/book/100097311" target="_blank" title="我，吞噬空间的不可名状生物">
                                <i class="icon-top">5</i><b>[异界幻想]</b>我，吞噬空间的不可名状生物                                <span class="num">44.5万</span>
                            </a>
                        </li>
                                                <li>
                            <a href="https://www.ciweimao.com/book/100096203" target="_blank" title="磁场武神以拳交友">
                                <i class="icon-top">6</i><b>[动漫穿越]</b>磁场武神以拳交友                                <span class="num">64.3万</span>
                            </a>
                        </li>
                                                </ul>
                </div>
                    </div>
        <div class="content-box content-box-last">
                <table class="book-list-table ly-fl">
                        <tr>
                                <th>[小说类别]</th>
                                <th width="170px">小说书名</th>
                                <th width="180px">最新章节</th>
                                <th width="130px">作者名</th>
                                <th width="90px">字数</th>
                                <th>更新时间</th>
                        </tr>

                                                                                    <tr>
                                    <td><p class="type">[同人]</p></td>
                                    <td><p class="name"><a href="https://www.ciweimao.com/book/100070134" target="_blank" title="神奇宝贝之灾厄">神奇宝贝之灾厄</a></p></td>
                                    <td><p class="chapter"><a href="https://www.ciweimao.com/chapter/103067437" target="_blank" title="第六十三章 伤">第六十三章 伤</a></p></td>
                                    <td><p class="author"><a href="https://www.ciweimao.com/reader/2864711" target="_blank" title="懒得个性">懒得个性</a></p></td>
                                    <td><p class="num">248208</p></td>
                                    <td><p class="date">2019-04-12</p></td>
                                </tr>
                                                            <tr>
                                    <td><p class="type">[游戏世界]</p></td>
                                    <td><p class="name"><a href="https://www.ciweimao.com/book/100027988" target="_blank" title="在封印者做特工的日子">在封印者做特工的日子</a></p></td>
                                    <td><p class="chapter"><a href="https://www.ciweimao.com/chapter/103067440" target="_blank" title="第两百一十八章  相互猜忌">第两百一十八章  相互猜忌</a></p></td>
                                    <td><p class="author"><a href="https://www.ciweimao.com/reader/320658" target="_blank" title="lhming">lhming</a></p></td>
                                    <td><p class="num">618933</p></td>
                                    <td><p class="date">2019-04-12</p></td>
                                </tr>
                                                            <tr>
                                    <td><p class="type">[青春日常]</p></td>
                                    <td><p class="name"><a href="https://www.ciweimao.com/book/100098306" target="_blank" title="水晶色的五等分">水晶色的五等分</a></p></td>
                                    <td><p class="chapter"><a href="https://www.ciweimao.com/chapter/103067439" target="_blank" title="59.  不放弃">59.  不放弃</a></p></td>
                                    <td><p class="author"><a href="https://www.ciweimao.com/reader/2464419" target="_blank" title="平生欢">平生欢</a></p></td>
                                    <td><p class="num">121269</p></td>
                                    <td><p class="date">2019-04-12</p></td>
                                </tr>
                                                            <tr>
                                    <td><p class="type">[动漫穿越]</p></td>
                                    <td><p class="name"><a href="https://www.ciweimao.com/book/100011908" target="_blank" title="英灵殿扩张计划">英灵殿扩张计划</a></p></td>
                                    <td><p class="chapter"><a href="https://www.ciweimao.com/chapter/103067436" target="_blank" title="第十二章 霞诗子（求订阅）">第十二章 霞诗子（求订阅）</a><i class='icon-vip-s'></i></p></td>
                                    <td><p class="author"><a href="https://www.ciweimao.com/reader/213026" target="_blank" title="一切皆虚幻">一切皆虚幻</a></p></td>
                                    <td><p class="num">809993</p></td>
                                    <td><p class="date">2019-04-12</p></td>
                                </tr>
                                                            <tr>
                                    <td><p class="type">[动漫穿越]</p></td>
                                    <td><p class="name"><a href="https://www.ciweimao.com/book/100100876" target="_blank" title="脱离系统流的我又进入了主神流">脱离系统流的我又进入了主神流</a></p></td>
                                    <td><p class="chapter"><a href="https://www.ciweimao.com/chapter/103067434" target="_blank" title="27.该操作了">27.该操作了</a></p></td>
                                    <td><p class="author"><a href="https://www.ciweimao.com/reader/1464991" target="_blank" title="全国第一宫永照">全国第一宫永照</a></p></td>
                                    <td><p class="num">54250</p></td>
                                    <td><p class="date">2019-04-12</p></td>
                                </tr>
                                                            <tr>
                                    <td><p class="type">[青春日常]</p></td>
                                    <td><p class="name"><a href="https://www.ciweimao.com/book/100094176" target="_blank" title="路人女配的养成方式">路人女配的养成方式</a></p></td>
                                    <td><p class="chapter"><a href="https://www.ciweimao.com/chapter/103067433" target="_blank" title="第六十五章  不经意间踩到了陷阱">第六十五章  不经意间踩到了陷阱</a><i class='icon-vip-s'></i></p></td>
                                    <td><p class="author"><a href="https://www.ciweimao.com/reader/809550" target="_blank" title="赵七罪">赵七罪</a></p></td>
                                    <td><p class="num">275384</p></td>
                                    <td><p class="date">2019-04-12</p></td>
                                </tr>
                                                            <tr>
                                    <td><p class="type">[动漫穿越]</p></td>
                                    <td><p class="name"><a href="https://www.ciweimao.com/book/100102456" target="_blank" title="梦想的境界">梦想的境界</a></p></td>
                                    <td><p class="chapter"><a href="https://www.ciweimao.com/chapter/103067432" target="_blank" title="第三章">第三章</a></p></td>
                                    <td><p class="author"><a href="https://www.ciweimao.com/reader/4001469" target="_blank" title="无色雨曦">无色雨曦</a></p></td>
                                    <td><p class="num">6338</p></td>
                                    <td><p class="date">2019-04-12</p></td>
                                </tr>
                                                            <tr>
                                    <td><p class="type">[青春日常]</p></td>
                                    <td><p class="name"><a href="https://www.ciweimao.com/book/100059515" target="_blank" title="我在东瀛开网贷">我在东瀛开网贷</a></p></td>
                                    <td><p class="chapter"><a href="https://www.ciweimao.com/chapter/103066605" target="_blank" title="第0249章田忌赛马！（求订阅）">第0249章田忌赛马！（求订阅）</a><i class='icon-vip-s'></i></p></td>
                                    <td><p class="author"><a href="https://www.ciweimao.com/reader/405470" target="_blank" title="朕的大秦不能亡">朕的大秦不能亡</a></p></td>
                                    <td><p class="num">1923812</p></td>
                                    <td><p class="date">2019-04-12</p></td>
                                </tr>
                                                            <tr>
                                    <td><p class="type">[超现实都市]</p></td>
                                    <td><p class="name"><a href="https://www.ciweimao.com/book/100101173" target="_blank" title="真正的狼学家理应如此！">真正的狼学家理应如此！</a></p></td>
                                    <td><p class="chapter"><a href="https://www.ciweimao.com/chapter/103067431" target="_blank" title="16.得罪了方丈也想跑？">16.得罪了方丈也想跑？</a></p></td>
                                    <td><p class="author"><a href="https://www.ciweimao.com/reader/4632898" target="_blank" title="骨气">骨气</a></p></td>
                                    <td><p class="num">43613</p></td>
                                    <td><p class="date">2019-04-12</p></td>
                                </tr>
                                                            <tr>
                                    <td><p class="type">[青春日常]</p></td>
                                    <td><p class="name"><a href="https://www.ciweimao.com/book/100055483" target="_blank" title="Low逼系统一直想让我女装">Low逼系统一直想让我女装</a></p></td>
                                    <td><p class="chapter"><a href="https://www.ciweimao.com/chapter/103067429" target="_blank" title="第四百三十章 看脸">第四百三十章 看脸</a><i class='icon-vip-s'></i></p></td>
                                    <td><p class="author"><a href="https://www.ciweimao.com/reader/54803" target="_blank" title="幸福又逆光">幸福又逆光</a></p></td>
                                    <td><p class="num">2152710</p></td>
                                    <td><p class="date">2019-04-12</p></td>
                                </tr>
                                                            <tr>
                                    <td><p class="type">[超现实都市]</p></td>
                                    <td><p class="name"><a href="https://www.ciweimao.com/book/100102293" target="_blank" title="我的老婆都是反派怎么办">我的老婆都是反派怎么办</a></p></td>
                                    <td><p class="chapter"><a href="https://www.ciweimao.com/chapter/103067427" target="_blank" title="第四章 超能力者的阶段">第四章 超能力者的阶段</a></p></td>
                                    <td><p class="author"><a href="https://www.ciweimao.com/reader/5139581" target="_blank" title="说">说</a></p></td>
                                    <td><p class="num">9102</p></td>
                                    <td><p class="date">2019-04-12</p></td>
                                </tr>
                                                            <tr>
                                    <td><p class="type">[异界幻想]</p></td>
                                    <td><p class="name"><a href="https://www.ciweimao.com/book/100101201" target="_blank" title="魔剑大人是本体">魔剑大人是本体</a></p></td>
                                    <td><p class="chapter"><a href="https://www.ciweimao.com/chapter/103067426" target="_blank" title="第十章 魔剑大人当机中">第十章 魔剑大人当机中</a></p></td>
                                    <td><p class="author"><a href="https://www.ciweimao.com/reader/5124169" target="_blank" title="凡人呆呆">凡人呆呆</a></p></td>
                                    <td><p class="num">24647</p></td>
                                    <td><p class="date">2019-04-12</p></td>
                                </tr>
                                                            <tr>
                                    <td><p class="type">[动漫穿越]</p></td>
                                    <td><p class="name"><a href="https://www.ciweimao.com/book/100100552" target="_blank" title="无限空间的流浪小店">无限空间的流浪小店</a></p></td>
                                    <td><p class="chapter"><a href="https://www.ciweimao.com/chapter/103067425" target="_blank" title="第二十章 白金帝国的法师">第二十章 白金帝国的法师</a></p></td>
                                    <td><p class="author"><a href="https://www.ciweimao.com/reader/3442295" target="_blank" title="一大瓶红茶">一大瓶红茶</a></p></td>
                                    <td><p class="num">43700</p></td>
                                    <td><p class="date">2019-04-12</p></td>
                                </tr>
                                                            <tr>
                                    <td><p class="type">[超现实都市]</p></td>
                                    <td><p class="name"><a href="https://www.ciweimao.com/book/100068239" target="_blank" title="都市超级透视">都市超级透视</a></p></td>
                                    <td><p class="chapter"><a href="https://www.ciweimao.com/chapter/103067423" target="_blank" title="第2273章 讨价还价">第2273章 讨价还价</a><i class='icon-vip-s'></i></p></td>
                                    <td><p class="author"><a href="https://www.ciweimao.com/reader/1808744" target="_blank" title="香叶">香叶</a></p></td>
                                    <td><p class="num">4851962</p></td>
                                    <td><p class="date">2019-04-12</p></td>
                                </tr>
                                                            <tr>
                                    <td><p class="type">[超现实都市]</p></td>
                                    <td><p class="name"><a href="https://www.ciweimao.com/book/100098889" target="_blank" title="我变成了怪物">我变成了怪物</a></p></td>
                                    <td><p class="chapter"><a href="https://www.ciweimao.com/chapter/103067420" target="_blank" title="第二十四章 逐渐热闹的世界">第二十四章 逐渐热闹的世界</a></p></td>
                                    <td><p class="author"><a href="https://www.ciweimao.com/reader/565610" target="_blank" title="强人锁男">强人锁男</a></p></td>
                                    <td><p class="num">49603</p></td>
                                    <td><p class="date">2019-04-12</p></td>
                                </tr>
                                                    
                </table>
                                <div class="recommend-box-cover ly-fr">
                        <div class="title-box icon-cat">
                                <h3 class="title">新书榜</h3>
                                <p class="sub-title">我要的次元</p>
                                <a class="btn btn-more" href="https://www.ciweimao.com/rank-index/yp_new" target="_blank">更多 &gt;</a>
                        </div>
                        <ul>
                                                            <li>
                                        <a class="img" href="https://www.ciweimao.com/book/100097305"><img class="lazyload" src="/home/static/picture/transparent.png" data-original="https://novel-cdn.kuangxiangit.com/uploads/allimg/c190314/14-03-19101602-48519-100097305.jpg" alt="无敌的我何须亲自动手"></a>
                                        <div class="info">
                                                <h3 class="tit"><a href="https://www.ciweimao.com/book/100097305" title="无敌的我何须亲自动手" target="_blank">无敌的我何须亲自动手</a></h3>
                                                <p class="author"><a target="_blank" href="https://www.ciweimao.com/reader/4468290">挖坑必填神巫六</a></p>
                                                <p class="desc">164 欢乐的气息（一更）</p>
                                                                                                <p class="tips">日更：12千+</p>
                                                                                        </div>
                                </li>
                                                            <li>
                                        <a class="img" href="https://www.ciweimao.com/book/100098356"><img class="lazyload" src="/home/static/picture/transparent.png" data-original="https://novel-cdn.kuangxiangit.com/uploads/allimg/c190311/11-03-19151904-92908-100098356.jpg" alt="文明：超越两界"></a>
                                        <div class="info">
                                                <h3 class="tit"><a href="https://www.ciweimao.com/book/100098356" title="文明：超越两界" target="_blank">文明：超越两界</a></h3>
                                                <p class="author"><a target="_blank" href="https://www.ciweimao.com/reader/343486">学霸殿下</a></p>
                                                <p class="desc">第六十章 命令</p>
                                                                                                <p class="tips">日更：6千+</p>
                                                                                        </div>
                                </li>
                                                            <li>
                                        <a class="img" href="https://www.ciweimao.com/book/100097315"><img class="lazyload" src="/home/static/picture/transparent.png" data-original="https://novel-cdn.kuangxiangit.com/uploads/allimg/c190301/01-03-19092416-28467-100097315.jpg" alt="女友全都是厉鬼"></a>
                                        <div class="info">
                                                <h3 class="tit"><a href="https://www.ciweimao.com/book/100097315" title="女友全都是厉鬼" target="_blank">女友全都是厉鬼</a></h3>
                                                <p class="author"><a target="_blank" href="https://www.ciweimao.com/reader/301315">七月酒仙</a></p>
                                                <p class="desc">第128章  诡笑</p>
                                                                                                <p class="tips">日更：4千+</p>
                                                                                        </div>
                                </li>
                                                            <li>
                                        <a class="img" href="https://www.ciweimao.com/book/100100123"><img class="lazyload" src="/home/static/picture/transparent.png" data-original="/home/static/images/09-04-19211539-69452-100100123.jpg" alt="月世界必不可能成为网游"></a>
                                        <div class="info">
                                                <h3 class="tit"><a href="https://www.ciweimao.com/book/100100123" title="月世界必不可能成为网游" target="_blank">月世界必不可能成为网游</a></h3>
                                                <p class="author"><a target="_blank" href="https://www.ciweimao.com/reader/5073920">活版印刷</a></p>
                                                <p class="desc">33.此为亚瑟的圆桌们</p>
                                                                                                <p class="tips">日更：6千+</p>
                                                                                        </div>
                                </li>
                                                    </ul>
                </div>
                        </div>
        <div class="go-top" id="J_GoTop">
                <a href="javascript:;">返回顶部</a>
        </div>
    </div>
</div>
<!--container end-->
@endsection
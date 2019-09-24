@extends('layouts.user.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/user_list.css?cacherefResh19111')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/user_sp.css?cacherefResh19111')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/agreement.css?cacherefResh19111')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/agreement_sp.css?cacherefResh19111')}}">
@endsection

@section('js')
    {{-- <script type="text/javascript">   
        $( function() { 
                $(document).scroll(function() { 
                    scrollHeight = $(this).height();
                    scrollPosition = $('#policy').height() + $(this).scrollTop(); 
                    if ((scrollHeight - scrollPosition) / scrollHeight <= 0.0001) {
                        //スクロールの位置が下部5%の範囲に来た場合
                        $('#agree').removeAttr('disabled');
                    }
                });
        }); 
    </script> --}}
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="{{asset('/js/agreement.js?cacherefResh19111')}}"></script>
@endsection

@section('main')
    <div id="mainBlk" class="sideSpace">
        <div class="main-body">
            <div class="scroll">
                <div class="check unShow" id="unShow">
                    <p>
                        利用規約に同意されていません。<br>サービスを利用する場合は、同意するにチェックを入れ、次へボタンを押してください。
                    </p>
                </div>
                <h3>利用規約</h3>
                <h2>【目的】 <h2>
                <h2>第一条 </h2>
                <p>
                    本利用規約は、写真館フォプロが運営する顔写真データダウンロードサービス(以下本サ 
                    ービスといいます)のご利用にあたり、撮影者本人(以下、お客様といいます)と当社の 
                    間で適用されます。 
                </p>
                <h2>【本サービスについて】</h2> 
                <h2>第二条 </h2>
                <p>
                    本サービスは、お客様の顔写真データを専用サイトからスマートフォンやパソコンにダウ 
                    ンロードできるサービスです。 
                </p>
                <h2>【お客様の義務】 </h2>
                <h2>第三条</h2>
                <p>
                    1. 本サービスを利用する際の通信費用は、お客様が負担するものとします。<br> 
                    2. 撮影された背景色によっては、ダウンロード時に選択する用途の規定とは異なる場合が 
                    ありますので、御客様は事前に証明写真を提出される左記の規定をご確認のうえで利用 
                    するものとします。 <br>
                    3. 受付証(お客様控え用紙)の再発行できませんので、お客様の責任において保管するも 
                    のとします。 <br> 
                </p>
                <h2>【お客様に関する情報の取扱い】</h2>
                <h2>第四条</h2> 
                <p>
                    本サービスは、後述の「個人情報のお取扱いについて」に基づきお客様の個人情報を取り 
                    扱うものとし、お客様は本方針をよくお読みいただきこれにご同意のうえ本サービスをご 
                    利用いただくものとします。 
                </p>
                <h2>【受付証(お客様控え用紙)の記載の管理】</h2>
                <h2>第五条 </h2>
                <p>
                    ID・パスワードなどの受付証(お客様控え用紙)に記載がある内容については、お客様 
                    の自己の責任にて管理するものとします。当社は本サービスをお客様のみに対し提供する 
                    ものであり、明示的に当社が許諾した場合を除き、本サービスを第三者に利用させる事を 
                    目的として、ID・パスワードなどの受付証(お客様控え用紙)に記載がある内容を第三 
                    者に貸与し、または使用させてはならないものとします。 
                </p>
                <h2>【顔写真データについて】</h2> 
                <h2>第六条 </h2>
                <p>
                    1. 当社はデータの管理に細心の注意を払いますが、予期せぬ事故によりお客様の顔写真デ 
                    ータが損なわれる可能性があります。その場合は、お客様に何らかの損害が生じたとし 
                    ても、当社はこれを賠償する責任を一切負わないものとします。 <br>
                    2. お客様ご自身がお使いの機器でご覧になる顔写真データと、ご利用店で表示される顔写 
                    真データ、または出力されるプリントにはモニターやハードウェア・設定等の差異、あ 
                    るいは表示、作成方法の原理的違いによる差異が生じます。これらを理由とした返金に 
                    は一切対応いたしませんのでご了承ください。 <br>
                    3. 顔写真データの当社所有サーバーでの保管期間は 12 ヶ月です。保管期間が過ぎた顔写 
                    真データについては当社責任をもって削除するものとします。<br> 
                    4. 本サービスまたはそれに付随するサービスを通じてお客様が入手する顔写真データに 
                    ついて、その正確性、完全性、有用性等いなかなる保証を行うものではありません。 <br> 
                </p>
                <h2>【利用の停止】</h2>
                <h2> 第七条 </h2>
                <p>
                    当社は次のいずれかに該当すると認められる場合は、本サービスの利用の停止休止または 
                    中断をすることができるものとします。これに起因して、お客様に何らかの損害が生じた 
                    としても、当社はこれに賠償する責任を一切負わないものとします。 <br> 
                    1 本サービスを構成する機器等の保守点検を行う場合 <br> 
                    2 天災、事変等の発生により本サービスに重大な故障が発生した場合 <br> 
                    3 その他、当社において、本サービスの利用の停止、休止または中断が必要と判断した場合 <br> 
                </p>
                <h2>【禁止事項】 </h2>
                <h2>第八条 </h2>
                <p>
                    お客様は、本サービスの利用にあたり、次に掲げる行為を行ってはなりません。次に掲げ 
                    る行為を行った場合、当社はお客様の本サービスの利用を中止できるものとします。 <br> 
                    1 法令または公序良俗に違反する行為 <br> 
                    2 犯罪行為に関連する行為 <br> 
                    3 本サービスの運営・管理を妨害するおそれのある行為 <br> 
                    4 他の利用者に成りすます行為 <br> 
                    5 本サービスに関連して、反社会的勢力に対して直接または間接に利益を供与する行為 <br> 
                    6 その他、当社が不適切と判断する行為 <br> 
                    7 当社、当サイト、その他の第三者を誹謗・中傷し、またはその名誉・信用を傷つける行 
                    為 <br> 
                </p>
                <h2>【免責事項】 </h2>
                <h2>第九条 </h2>
                <p>
                    当社は本サービスに関連して、次の各号についてお客様に生じた損害について一切の責任 
                    を負いません。 <br> 
                    1 本サービスのうち当社の管理下にない設備・通信環境等の障害による損害 <br> 
                    2 本サービスへの不正アクセスや第三者の違法行為による損害 <br> 
                    3 通常講ずるべきウィルス対策では防止できないウィルス被害による損害 <br> 
                    4 自然災害や当社の合理的統制が不可能な状況下で発生した損害 <br> 
                    5 お客様が本サービスを利用することにより第三者との間に生じた粉争等の損害 <br> 
                    6 本サービスの停止、休止、中断または廃止によって生じた損害 <br> 
                    7 その他当社に帰責事由がない損害 <br> 
                </p>
                <h2>【損害賠償】</h2>
                <h2>第十条</h2>
                <p>
                    1.当社は本サービスに関連して、お客様が本規約に違反または不正もしくは違法な行為によ 
                    り、当社または当サイトに損害を与えた場合は、お客様はその損害(弁護士費用含む)を 
                    賠償しなければならないものとします。 <br> 
                    2.本サービスの利用に】関して受付番号・パスワードなどの受付証(お客様控え用紙)の第 
                    三者による無断使用等、お客様と第三者との間に紛争が生じた場合、お客様が自己の責任 
                    と負担において解決を図るものとし、当社および第三者に一切迷惑をかけないものとしま 
                    す。また無断使用により当社に損害が生じた場合、お客様はその損害を賠償するものとし 
                    ます <br> 
                </p>
                <h2>【利用規約の内容変更】</h2>
                <h2>第十一条 </h2>
                <p>
                    当社は当社の都合により本規約の内容を必要に応じ予告なく改定することができるものと 
                    します。 <br>
                </p>
                <h2>【準拠法】 </h2>
                <h2>第十二条 </h2>
                <p>
                    本規約の準拠法は日本法とします。 <br>
                </p>
                <h2>【協議】 </h2>
                <p>
                    本規約に定めのない事項または本規約に関する疑義については、お客様と当社との間で誠 
                    実に協議して解決するものとします。<br>
                </p> 
                <h2>【個人情報の利用目的】 </h2>
                <p>
                    お客様より取得した個人情報(顔写真など)を以下に定める目的の範囲で利用します。<br> 
                    1. お客様への顔写真データ提供のため <br>
                    2. お客様からのお問い合わせ対応のため <br>
                </p>
                <h2>【個人情報の管理】 </h2>
                <p>
                    お客様より提供された個人情報は、個人情報の提供を受けた当社各部門・各関係会社にて、 
                    責任をもって適切な方法により管理し、紛失、盗難、改ざん及び漏洩などの事故の発生を 
                    防止いたします。 <br>
                    ※ プライバシーポリシー(個人情報保護基本方針)については、写真館フォプロの規定に準拠いたします。
                    <a href="https://www.phopro.jp/privacy.html ">https://www.phopro.jp/privacy.html </a>
                </p>
                <h2>【サイトのご利用条件】 </h2>
                <p>
                    当社は、当社が掲載する本サービスに関連するウェブサイト(以下、本サイトといいます) 
                    を本サイトの閲覧者(以下、利用者といいます)が <br>
                    • 1 利用者のコンピュータのディスプレー上に表示し、閲覧すること <br>
                    • 2 非営利目的でかつご自身で利用するため、利用者のコンピュータにダウンロード 
                    すること <br>
                    • 3 非営利目的でかつご自身で利用するため、表示またはダウンロードしたうえでプ 
                    リントアウトすること 
                    を許諾します。 <br>
                    なお、本サイトおよび本サイト上に掲載される個々の文章、図形、デザイン、画像、商標・ 
                    ロゴマーク・商品名称などに関する著作権その他の権利は当社または原著作権者その他の 
                    権利者が有しています。 
                    利用者は、本サイトのご利用にあたっては、あわせて以下の事項をお守りください。 <br>
                    • 本サイト上に明示的に許諾されているか、または当社・原著作権者その他の権利者 
                    の事前の承諾を得なければ、ダウンロードしまたはプリントアプトする内容を改 
                    変・変更などしてはいけません。 <br><br>
                    • 本サイト上の特定の画像などを切り取り、ダウンロードし使用する行為は、当該画 
                    像などにつき著作権その他の権利を有する当社・原著作権者その他の権利者の権利 
                    を侵害することとなります。 本サイト上に明示的に許諾されているか、または当 
                    社・原著作権者その他の権利者の事前の承諾を得なければ、当該行為を行ってはい 
                    けません。 <br><br>
                    • 本サイトへのリンクは、原則として自由に設定していただいてかまいません。ただ 
                    し、以下のようなリンクはご遠慮ください。 <br>
                    1. 1 意図的にフレーム内の一部に本サイトのコンテンツを表示するようなリ 
                    ンク <br>
                    2. 2 本サイト内の画像、映像などを直接リンク元のページ内に表示するよう 
                    なリンク <br>
                    3. 3 リンク元のサイトと当社の関係を誤認させるおそれのあるリンク <br>
                    4. 4 違法な内容のサイト、公序良俗に反する内容のサイトからのリンク <br>
                    5. 5 違法、不当な目的で行われるリンク <br>
                    6. 6 その他、当社の信用を損なうなど、当社に不利益を与えるおそれのある 
                    リンク <br>
                    本サイト上のあらゆるページの内容は、事前の予告無しに変更あるいは削除するこ 
                    とがあります。また、事前の予告無しに URL を変更することがあります。あらかじ 
                    めご了承ください。 その他、本サイトへリンクしたことによるいかなる不利益に対 
                    しても、当社は一切の責任を負わないものとします。 <br><br>
                    • 本利用条件のほか、本サイトの利用に関し、本サイト上に何らかの規定が別途記載 
                    されている場合は、利用者は当該規定に従ってください。 当社は本サイトを、何ら 
                    の明示または黙示の保証なく、そのままの状態で利用者に提供するにとどまるもの 
                    であり、利用者が本サイトを利用することにより生じる一切の損害につき、いかな 
                    る責任も負わないものとします。 最新かつ正確な当社に関する情報を利用者に提供 
                    するため、当社は何時でも本サイト中の不正確な記載や誤植を修正・変更し、また 
                    内容を改変・更新することができます。 <br><br><br>
                </p>
                <p class="boxing">
                    <input id="Checkbox1" type="checkbox" class="box" value="1" onchange="myfunc(this.value)">本利用規約に同意しますか。
                </p>
            </div>
            <div class="overlay" onclick="clickfunc(this.value)">
                <div class="btn-list">
                    {{-- <a href="{{route('userpage')}}" class="sendButton btn disabled" id="disabled" > 次へ</a> --}}
                    <form action="{{route('chageStatus')}}" method="POST">
                        {{ csrf_field() }}
                        <input type='hidden' value='1' name="agreement_status">
                        <input type='submit' class="sendButton btn disabled" id="disabled" value='次へ'>
                    </form>
                </div>
            </div>
    </div>
@endsection


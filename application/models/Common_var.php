<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_var extends CI_Model {
	

    function __construct()
    {
        parent::__construct();

    }

    function get_home_var_english()
    {
    	$earn_by_car = "Rent out space to us on the sides and/or the windows of your car  so that we can place advertisements on it. You do not have to do anything for it and these advertisements will cover your car’s fixed costs simply by driving around. Registering your car for this purpose in our database is absolutely free. Your car should be in relatively good condition - nobody would like to place an advertisement on a battered old boneshaker! We would facilitate one or more advertising partners for you who would then supply stickers to be applied on your car. You have the right to reject the advertising partner that we propose ie if you cannot accept the colour, the brand or for ethical reasons. Our goal is to keep all partners happy and satisfied. You can determine the price you would like to get yourself. Of course we can give you an indication of the usual market price. If you follow this indication or even stay below this level we can find an advertisement for you quickly and guaranteed. Once the contract becomes  effective, we supply the stickers which you can usually fix yourself following simple guidelines. Larger or more complicated stickers would be fixed by an authorized service company located near you and entirely at our expense. Finally, you take a photo of your car with the sticker(s) applied and send it to us. From then on your car starts earning money without doing anything further except moving around. You will earn money for one year with the option to continue for as long as both parties agree. Once the contract has finished you can remove the sticker (with some difficulty but without leaving any imprints on your car). The sticker cannot be used again and has to be disposed of.";
    	$let_your_ad_move_around = "You are certainly using your company cars to advertise your products so why not do the same with a number of private vehicles which can facilitate this? Of course you have to pay a little bit extra for that but you can be sure that you can increase your level of awareness tremendously. If you are acting in a local market, we can facilitate cars moving around exactly in your specified region. Registering your company in our database is absolutely free of charge. The price you are willing to pay for the advertisements will be determined by yourself. Of course we can help you with an indication of the usual market price. If you follow this indication or even stay below this level you can be sure that we quickly find cars on which advertisements can be applied. The contract which we have to sign is still not active until this point. It will be effective only after you have approved the cars which we propose. Finally, you will normally have to provide the stickers to enable us to give them to the car owners. If you are already applying stickers to your company cars you will probably have an existing producer. If not, just send us pdf-documents of your advertisements as we have a company who would be able to produce stickers for you. Only after the stickers are applied on the cars according to the guidelines of the producer and you have received a photo as proof, the business really starts. From then on, your advertisement moves around in the region of your choice.";
    	$terms_condition = "Registering a car or a company in our database does not create a contract. After registering, we shall ask you for further detailed information and send you a draft contract which will have to be signed first. As a car owner or an advertising partner you will not become liable to pay or be entitled to receive any money as the contract will only become effective after we have found a car for an advertisement and both parties have approved it. The contract will last for the duration of one year with the option of extending it for a longer period. Sole contract partner for you will always be ad on wheels as we take care of everything concerning this business. As a car owner or advertising partner you do not have to do anything. ad on wheels earns commission from the money received from the advertising partners. Everything about termination or extension of the contract will be dealt with in full detail in the contract. It will also be assured by requesting continuous evidence that the advertisement is not removed during the duration of the contract.";
    	$data = array('earn_by_car' => $earn_by_car,'let_your_ad_move_around'=> $let_your_ad_move_around,'terms_condition'=> $terms_condition );
    	//print_r($data);
    	return $data;
    }

    function get_home_var_deutsche()
    {
        $earn_by_car = "<p>Vermieten Sie Flächen auf Ihrem Auto an uns, damit wir Werbung für Firmen oder Produkte darauf platzieren können. Sie müssen quasi nichts tun. Und Ihr Auto finanziert seine fixen Kosten von ganz allein.</p>

                        <p>Tragen Sie Sich dazu vollkommen kostenlos in unsere Datenbank ein. Ihr Auto sollte sich dazu in einem relativ guten Pflegezustand befinden. Auf einer verbeultem Blechkarosse möchte niemand gern Werbung betreiben.</p> 

                        <p>Wir vermitteln Ihnen dazu einen oder mehrere Werbepartner, die Ihnen Banner auf Folien liefern werden. Bei dem Werbepartner, den wir Ihnen vorschlagen werden, haben Sie das Recht, den Vertragsabschluss zu verweigern, wenn Sie Sich z.B. mit der Marke oder den Farben nicht identifizieren können. Wir möchten, dass alle Beteiligten zufrieden und glücklich sind.</p> 

                        <p>Den Preis, den Sie erzielen möchten, bestimmen Sie selber. Natürlich geben wir Ihnen Hinweise zu üblichen Marktpreisen. Wenn Sie Sich daran ausrichten oder gar darunter bleiben, können Sie schnell und sicher einen Werbepartner von uns vermittelt bekommen.
                        Ist der Vertrag zustande gekommen, liefern wir Ihnen die Banner, die Sie in einfachen Fällen selber an den vereinbarten Stellen Ihres Autos anbringen können. Bei größeren und komplizierten Bannern müssen Sie Ihr Auto zu einem Fachbetrieb in Ihrer Nähe bringen, natürlich für Sie kostenlos.</p>

                        <p>Und zum Schluss schießen Sie ein Foto Ihres Autos mit der Werbung und schicken es uns zu und schon geht das Geld Verdienen los. Ihr Auto verdient seine Kosten von jetzt an selber mit, zunächst für ein Jahr und, wenn Sie möchten, auch länger. Nach Ende des Vertrages können Sie die Banner-Folie nicht ganz einfach, aber ohne Spuren auf Ihrem Auto zu hinterlassen, entfernen. Er kann dann nicht wieder verwendet werden und muss entsorgt werden.</p>";
        $let_your_ad_move_around = "<p>Sie benutzen bereits Ihre Firmenfahrzeuge als Werbeflächen für Ihre Produkte? Warum machen Sie das nicht auch mit Privatfahrzeugen, die wir Ihnen vermitteln können? Natürlich kostet Sie das etwas. Aber Sie können sicher sein, damit einen enorm breiten Bekanntheitsgrad zu erreichen. Wenn Sie in einem lokalen Markt tätig sind, können wir Ihnen Fahrzeuge vermitteln, die genau in diesem Umfeld unterwegs sind.</p>

                        <p>Tragen Sie Sich einfach und vollkommen kostenlos in unsere Datenbank ein. Den Preis, den Sie bereit sind zu zahlen, bestimmen Sie selber. Natürlich helfen wir Ihnen mit Hinweisen zu marktüblichen Preisen. Wenn Sie die einhalten oder darüber hinaus gehen, können Sie sicher sein, dass wir schnell und leicht Fahrzeuge für Sie finden, auf denen Sie Ihre Werbung platzieren können.</p>

                        <p>Ein Vertrag kommt dadurch noch nicht zustande. Der wird erst wirksam, wenn wir Fahrzeuge für Sie gefunden haben, die Sie auch anhand ihrer Daten akzeptieren.</p>

                        <p>Jetzt müssen Sie uns nur noch die Werbebanner zur Verfügung stellen. Wahrscheinlich haben Sie dafür Ihre Bezugsquellen. Wenn nicht, senden Sie uns pdf-Dokumente in höchster Qualität oder noch besser Vektorgrafik-Dokumente, damit wir die Banner in einem Fachbetrieb für Sie herstellen lassen können und den Autohaltern, die wir für Sie ausgewählt haben, zur Verfügung stellen können.</p>

                        <p>Erst wenn die Banner fachgerecht montiert sind und Sie darüber einen Foto-Beweis erhalten haben, geht es richtig los. Jetzt rollt Ihre Werbung in der von Ihnen gewählten Region und macht Sie noch bekannter als Sie ohnehin schon sind.</p>";
        $terms_condition = "<p>Der Eintrag in unsere Datenbank löst zunächst noch kein Vertragsverhältnis aus. Wir werden Sie danach um Detail-Angaben bitten und Ihnen einen Vertragsentwurf zusenden, der erst mit Ihrer Unterschrift wirksam wird. Als Autohalter oder als Werbepartner werden Sie damit auch noch nicht Zahlungsempfänger oder Zahlungspflichtiger. Richtig wirksam wird der Vertrag erst, wenn wir für ein Auto den passenden Werbepartner gefunden haben und beide Parteien dem zugestimmt haben.</p>

                        <p>Der Vertrag wird dann für ein Jahr mit der Option auf Verlängerung geschlossen. Vertragspartner ist für alle Beteiligten immer ad on wheels, denn wir kümmern uns um alles. Auf Sie als Autohalter oder Werbepartner kommt überhaupt keine Arbeit zu. ad on wheels finanziert sich über einen kleinen Aufschlag, den wir auf die Werbeflächen erheben, die wir 
                        ankaufen und weiter verkaufen.</p>  

                        <p>Alles über die Kündigung oder Verlängerung des Vertrages werden Sie im Vertrag vollständig geregelt finden. Es wird auch sicher gestellt, dass die Werbung über die Dauer des Vertrages nicht entfernt werden kann. Entsprechende Nachweise werden Sie regelmäßig liefern müssen oder bekommen.</p>";
        $data = array('earn_by_car' => $earn_by_car,'let_your_ad_move_around'=> $let_your_ad_move_around,'terms_condition'=> $terms_condition );
        //print_r($data);
        return $data;
    }

    function get_home_var_min_english()
    {
        $earn_by_car = "Rent out space to us on the sides and/or the windows of your car  so that we can place advertisements on it. You do not have to do anything for it and these advertisements will cover your car’s fixed costs simply by driving around. Registering your car for this purpose in our database is absolutely free.";
        $let_your_ad_move_around = "You are certainly using your company cars to advertise your products so why not do the same with a number of private vehicles which can facilitate this? Of course you have to pay a little bit extra for that but you can be sure that you can increase your level of awareness tremendously.";
        $terms_condition = "Registering a car or a company in our database does not create a contract. After registering, we shall ask you for further detailed information and send you a draft contract which will have to be signed first. As a car owner or an advertising partner you will not become liable to pay or be entitled to receive any money ...";
        $data = array('earn_by_car' => $earn_by_car,'let_your_ad_move_around'=> $let_your_ad_move_around,'terms_condition'=> $terms_condition );
        //print_r($data);
        return $data;
    }

    function get_home_var_min_deutsche()
    {
        $earn_by_car = "Vermieten Sie Flächen auf Ihrem Auto an uns, damit wir Werbung für Firmen oder Produkte darauf platzieren können. Sie müssen quasi nichts tun. Und Ihr Auto finanziert seine fixen Kosten von ganz allein.";
        $let_your_ad_move_around = "Sie benutzen bereits Ihre Firmenfahrzeuge als Werbeflächen für Ihre Produkte? Warum machen Sie das nicht auch mit Privatfahrzeugen, die wir Ihnen vermitteln können? Natürlich kostet Sie das etwas. Aber Sie können sicher sein, damit einen enorm breiten...";
        $terms_condition = "Der Eintrag in unsere Datenbank löst zunächst noch kein Vertragsverhältnis aus. Wir werden Sie danach um Detail-Angaben bitten und Ihnen einen Vertragsentwurf zusenden, der erst mit Ihrer Unterschrift wirksam wird. Als Autohalter oder als Werbepartner werden Sie damit auch ...";
        $data = array('earn_by_car' => $earn_by_car,'let_your_ad_move_around'=> $let_your_ad_move_around,'terms_condition'=> $terms_condition );
        //print_r($data);
        return $data;
    }

    public function get_add_car_instr_english()
    {
        $add_car_instr = "<p>Ad on wheels guarantee that none of the personal information you provide here neither will be published anywhere nor will be used anyway without your concern. Only the general information like space for Ad, location of the car, daily/weekly run etc. will be visible to the advertising company.</p><p>Please provide all information correctly. You can change all information provide here later stage. For example, if you want to place ad on both door and rear now but later decide to place Ad only on rear you can do that including all car related information.</p><p>You have to upload photo of your car where advertising place has to be visible. Please keep few photos of your car available before proceed. Alternatively you can upload the car information now and upload the photo later.</p><p>You can see all the provided information including uploaded photo of your car from 'car provider/portfolio' menu and if require edit from there should you wish to do so.</p><p>For any further assistance please contact us through 'About us' menu. </p><p>Greetings.</p>";
        return $add_car_instr;
    }

    public function get_add_car_instr_deutsche()
    {
        $add_car_instr = "<p> Werbung auf Rädern garantiert, dass keine der von Ihnen hier angegebenen persönlichen Daten weder veröffentlicht noch ohne Ihre Bedenken verwendet werden. Nur die allgemeinen Informationen wie Platz für Anzeige, Standort des Autos, täglicher / wöchentlicher Lauf usw. wird für die Werbeagentur sichtbar sein. </ p> <p> Bitte geben Sie alle Informationen korrekt an. Sie können alle Informationen, die Sie später bereitstellen, ändern. Wenn Sie beispielsweise eine Anzeige jetzt sowohl an der Tür als auch an der Rückseite platzieren möchten, aber später entscheiden. Um Ad nur auf der Rückseite zu platzieren, können Sie das mit allen Informationen zum Auto tun. </ p> <p> Sie müssen ein Foto Ihres Autos hochladen, wo der Werbeplatz sichtbar sein soll. Alternativ können Sie die Fahrzeuginformationen jetzt hochladen und das Foto später hochladen. </ P> <p> Sie können alle bereitgestellten Informationen einschließlich des hochgeladenen Fotos Ihres Autos aus dem Menü 'Fahrzeuganbieter / Portfolio' sehen. möchte dies tun. </ p> <p> Für weitere Unterstützung Bitte kontaktieren Sie uns über das Menü 'Über uns'. </ p> <p> Grüße. </ p> ";
        return $add_car_instr;
    }

  
}
 
?>
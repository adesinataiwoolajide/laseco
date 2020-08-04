// this script jus generates dynamic html, nothing more

var lGA = {
    'Abia State': [
       'Aba North', 'Aba South', 'Arochukwu', 'Bende', 'IKwano', 'Isiala Ngwa North', 'Isiala Ngwa South', 'Isiukwuato', 'Obi Ngwa', 'Ohafia', 'Osisioma Ngwa', 'Ugwunagbo', 'Ukwa East', 'Ukwa West', 'Umuahia North', 'Umuahia South', 'Umunneochi'
    ],
    'Adamawa State': [
       'Demsa', 'Fufore', 'Ganaye', 'Gireri', 'Gombi', 'Guyuk', 'Hong', 'Jada', 'Lamurde', 'Madagali', 'Maiha', 'Mayo-Belwa', 'Michika', 'Mubi North', 'Mubi South', 'Numan', 'Shelleng', 'Song', 'Toungo'
    ],
    'Anambra State': [
        'Aguata', 'Awka North', 'Awka South', 'Anambra West', 'Anaocha', 'Ayamelum', 'Dunukofia', 'Ekwusigo Idemili North', 'Idemili South', 'Ihiala' , 'Njikoka', 'Nnewi North', 'Nnewi South', 'Ogbaru', 'Onitsha North', 'Onitsha South', 'Orumba South', 'Orumba North', 'Oyi'
    ],
    'Bauchi State': [
        'Bauchi', 'Tafawa Belewa', 'Dambam', 'Darazo', 'Dass', 'Toro', 'Bogoro', 'Ningi', 'Warji', 'Ganjuwa', 'Kirfi', 'Alkaleri', 'Misau', 'Giade', 'Shira', 'Jamaare', 'Katagum', 'Itas/Gadau', 'Zaki', 'Gamawa'
    ],
    'Bayelsa State': [
        'Brass', 'Ekeremor', 'Kolokuma/Opokuma', 'Nembe', 'Ogbia', 'Sagbama', 'Southern Ijaw', 'Yenagoa'
    ],
    'Benue State': [
        'Ado', 'Agatu', 'Apa', 'Buruku', 'Gboko', 'Guma', 'Gwer West', 'Gwer East', 'Katsina Ala', 'Konshisha', 'Kwande', 'Logo', 'Markurdi', 'Obi', 'Ogbadibo', 'Ohimini', 'Oju', 'Okpokwu', 'Otukpo', 'Tarka', 'Ukum', 'Ushongo', 'Vandeikya'
    ],
    'Borno State': [
        'Maiduguri', 'Ngala', 'Kala/Balge', 'Mafa', 'Konduga', 'Barna', 'Jere', 'Dikwa', 'Askira/Uba', 'Bayo', 'Biu', 'Chibok', 'Damboa', 'Gwoza', 'Hawul', 'Kwaya Kusar', 'Shani Abadam', 'Gubio', 'Guzamala', 'kaga', 'Kukawa', 'Magumeri', 'Marte', 'Mobbar', 'Monguno', 'Nganzai'
    ],
    'Cross Rivers State': [
        'Abi', 'Akamkpa', 'Akpabuyo', 'Bakassi', 'Bekwarra', 'Biase', 'Boki', 'Calabar', 'Municipal', 'Calabar South', 'Etung', 'Ikom', 'Obanliku', 'Obubra', 'Obudu', 'Odukpani', 'Ogoja', 'Yakuur', 'Yala'
    ],
    'Rivers State': [
        'Abua/Odual', 'Ahoada East', 'Ahoada West', 'Akuku Toru', 'Andoni', 'Asari-Toru', 'Bonny', 'Degema', 'Emohua', 'Eleme', 'Etche', 'Gokana', 'Ikwere', 'Khana', 'Obio/Akpor', 'Ogba/Egbema/Ndoni', 'Ogu/Bolo', 'Okrika', 'Omuma', 'Opobo Nkoro', 'Oyigbo', 'Port Harcourt', 'Tai'
    ], 
    'Delta State': [
        'Ethiope East', 'Ethiope West', 'Okpe', 'Sapele', 'Udu', 'Ughelli South', 'Ughilli North', 'Uvwie', 'Aniocha North', 'Aniocha South', 'Ika North East', 'Ika South', 'Ndokwa', 'West', 'Oshimili North', 'Oshimili South', 'Ukwuani', 'Bomadi', 'Burutu', 'Isoko North', 'Patani', 'Warri North', 'Warri South', 'Warri South West'
    ],
    'Ebonyi State':[
        'Abakaliki', 'Afikpo North', 'Afikpo South', 'Ebonyi', 'Ezza North', 'Ezza South', 'Ikwo', 'Ishielu', 'Ivo', 'Izzi', 'Ohaozara', 'Ohaukwu', 'Onicha'
    ],
    'Edo State': [
        'Akoko-Edo', 'Egor', 'Esan Central', 'Esan North-East', 'Esan South-East', 'Esan West', 'Etsako Central', 'Etsako West', 'Igueben', 'Ikpoba-Okha', 'Oredo', 'Orhionmwon', 'Ovia North-East', 'Ovia South-West', 'Owan East', 'Owan West', 'Uhunmwonde'
    ],
    'Ekiti State': [
        'Ado-Ekiti', 'Ikere', 'Oye', 'Aiyekire', 'Efon', 'Ekiti East', 'Ekiti South-West', 'Ekiti West', 'Emure', 'Ido-Osi', 'Ijero', 'Ikole', 'Ilejemeje', 'Irepodun/Ifelodun', 'Ise/Orun', 'Moba'
    ],
    'Enugu State': [
        'Aninri', 'Awgu', 'Enugu East', 'Enugu North', 'Enugu South', 'Ezeagu', 'Igbo Etiti', 'Igbo Eze North', 'Igbo Eze South', 'Isi Uzo', 'Nkanu East', 'Nkanu West', 'Nsukka', 'Oji River', 'Udenu', 'Udi', 'Uzo-Uwani'
    ],
    'Gombe State': [
        'Akko', 'Balanga', 'Biliri', 'Dukku', 'Funakaye', 'Gombe', 'Kaltungo', 'Kwami', 'Nafada', 'Shongom', 'Yamaltu/Deba'
    ],
    'Imo State': [
        'Aboh Mbaise', 'Ahiazu Mbaise', 'Ehime Mbano', 'Ezinihitte Mbaise', 'Ideoto North', 'Ideato South', 'Ihitte/Uboma', 'Ikeduru', 'Isiala Mbano', 'Isu, Mbaitoli', 'Ngor Okpala', 'Njaba', 'Nkwerre', 'Nwangele', 'Obowo', 'Oguta', 'Ohaji/Egbema', 'Okigwe', 'Onuimo', 'Orlu', 'Orsu', 'Oru East', 'Oru West', 'Owerri Manucipal', 'Owerri North', 'Owerri West'
    ],
    'Jigawa State': [
        'Auyo', 'Babura', 'Birniwa', 'Birnin Kudu', 'Buji', 'Dutse', 'Gagarawa', 'Garki', 'Gumel', 'Guri', 'Gwaram', 'Gwiwa', 'Hadejia', 'Jahun', 'Kafin Hausa', 'Kaugama', 'Kazaure', 'Kiri Kasama', 'Kiyawa', 'Maigatari', 'Malam Madori', 'Miga', 'Ringim', 'Roni', 'Sule Tankarkar', 'Taura', 'Yankwashi'
    ],
    'Kaduna State': [
        'Birnin Gwari', 'Chikun', 'Giwa', 'Igabi', 'Ikara', 'Jaba', 'Jemaa', 'Kachia', 'Kaduan North', 'Kaduna South', 'Kagarko', 'Kajuru', 'Kaura', 'Kauru', 'Kubau', 'Kudan', 'Lere', 'Makarfi', 'Sabon Gari', 'Sanga', 'Soba', 'Zangon Kataf', 'Zaria'
    ], 
    'Kano State': [
        'Ajingi', 'Albasu', 'Bagwai', 'Bebeji', 'Bichi', 'Bunkure', 'Dala', 'Dambatta', 'Dawakin Kudu', 'Dawakin Tofa', 'Doguwa', 'Fagge', 'Gabassawa', 'Garko', 'Garum Mallam', 'Gaya', 'Gezawa', 'Gwale', 'Gwarzo', 'Kabo', 'Kano Municipal', 'Karaye', 'Kibiya', 'Kiru', 'Kumbotso Kunchi', 'Kura', 'Madobi', 'Makoda', 'Minijibar', 'Nasarawa', 'Rano', 'Rimin Gado', 'Rogo', 'Shanono', 'Sumaila', 'Takai', 'Tarauni', 'Tofa', 'Tsanyawa', 'Tudum Wada', 'Ungogo', 'Warawa Wudil'
    ],
    'Katsina State': [
        'Bakori', 'Batagarawa', 'Batsari', 'Baure', 'Bindawa', 'Charanchi', 'Dan Musa', 'Dandume', 'Danja', 'Daura', 'Dutsi', 'Dutsin-Ma', 'Faskari', 'Funtua', 'Ingawa', 'Jibia', 'Kafur', 'Kaita', 'Kankara', 'Kankia', 'Katsina', 'Kurfi', 'Kusada', 'MaiAdua', 'Malumfashi', 'Mani', 'Mashi', 'Matazu', 'Musawa', 'Rimi', 'Sabuwa', 'Safana', 'Sandamu', 'Zango'
    ],
    'Kebbi State': [
        'Aliero', 'Arewa', 'Dandi', 'Argungu', 'Augie', 'Bagudo', 'Birnin Kebbi', 'Bunza', 'Dandi', 'Fakai', 'Gwandu', 'Jega', 'Kalgo', 'Koko/Besse', 'Maiyawa', 'Ngaski', 'Sakaba', 'Shanga', 'Suru', 'Danko/Wasagu', 'Yauri', 'Zuru'
    ],
    'Kogi State': [
        'Adavi', 'Ajaokuta', 'Ankpa', 'Bassa', 'Dekina', 'Ibaji', 'Idah', 'Igalamela-Odolu', 'Ijumu', 'Kabba/Bunu', 'Koton Karfe', 'Lokoja', 'Mopa-Muro', 'Ofu', 'Ogori/Magongo', 'Okehi', 'Okene', 'Olamaboro', 'Omala', 'Yagba East', 'Yagba West'
    ],
    'Kwara State': [
        'Asa', 'Baruten', 'Edu', 'Ekiti', 'Ifelodun', 'Ilorin East', 'Ilorin South', 'Ilorin West', 'Irepodun', 'Isin', 'Kaiama', 'Moro', 'Offa', 'Oke Ero', 'Oyun Patigi'
    ],
    'Lagos State': [
        'Alimosho', 'Ajeromi-Ifelodun', 'Kosofe', 'Mushin', 'Oshodi-Isolo', 'Ojo', 'Ikorodu', 'Surulere', 'Agege', 'Ifako-Ijaiye', 'Shomolu', 'Amuwo-Odofin', 'Lagos Mainland', 'Ikeja', 'Eti-Osa', 'Badagry', 'Apapa', 'Lagos Island', 'Epe', 'Ibeju-Lekki'
    ],
    'Nasarawa State': [
        'Akwanga', 'Awe', 'Doma', 'Karu', 'Keana', 'Keffi', 'Kokona', 'Lafia', 'Nasarawa Eggon', 'Obi', 'Toto', 'Wamba'
    ],
    'Niger State': [
        'Agaie', 'Agwara', 'Bida', 'Borgu', 'Bosso', 'Chanchaga', 'Edati', 'Gbato', 'Gurara', 'Katcha', 'Kontagora', 'Lapai', 'Lavun', 'Magama', 'Mariga', 'Mashegu', 'Mokwa', 'Munya', 'Paikoro', 'Rafi', 'Rijau', 'Shiroro', 'Suleja', 'Tafa', 'Wushishi'
    ],
    'Ogun State': [
        'Abeokuta North', 'Abeokuta South', 'Ado-Odo/Ota', 'Ewekoro', 'Ifo', 'Ijebu East', 'Ijebu North', 'Ijebu North East', 'Ijebu Ode', 'Ikenne', 'Imeko Afon', 'Ipokia', 'Obafemi Owode', 'Odogbolu', 'Odeda', 'Ogun Waterside', 'Remo North', 'Sagamu', 'Yewa North', 'Yewa South'
    ],
    'Ondo State': [
        'Akoko North-East', 'Akoko North-West', 'Akoko South-East', 'Akoko South-West', 'Akure North', 'Akure South', 'Ese Odo', 'Idanre', 'Ifedore', 'Ilaje', 'Ile Oluji/Okeigbo', 'Irele', 'Odigbo', 'Okitipupa', 'Ondo East', 'Ondo West', 'Ose', 'Owo'
    ],
    'Osun State': [
        'Aiyedade', 'Aiyedire', 'Atakumosa East', 'Atakumosa West', 'Boluwaduro', 'Boripe', 'Ede North', 'Ede South', 'Egbedore', 'Ejigbo', 'Ife Central', 'Ife East', 'Ife North', 'Ife South', 'Ifedayo', 'Ifelodun', 'Ila', 'Ilesha East', 'Ilesha West', 'Irepodun', 'Irewole', 'Isokan', 'Iwo', 'Obokun', 'Odo-Otin', 'Ola-Oluwa', 'Olorunda', 'Oraide', 'Orolu', 'Osogbo'
    ],
    'Oyo State': [
        'Akinyele', 'Afijio', 'Egbeda', 'Ibadan North', 'Ibadan North-East', 'Ibadan North-West', 'Ibadan South-East', 'Ibarapa Central', 'Ibarapa East', 'Ido', 'Irepo', 'Iseyin', 'Kajola', 'Lagelu', 'Ogbomossho South', 'Ogbomosho North', 'Oyo West', 'Atiba', 'Atisbo', 'Saki West', 'Saki East', 'Itesiwaju', 'Iwajowa', 'Ibarapa North', 'Olorunsogo', 'Oluyole', 'Ogo Oluwa', 'Surulere', 'Orelope', 'Ori Ire', 'Oyo East', 'Ona Ara'
    ],
    'Plateau State': [
        'Barkini Ladi', 'Bassa', 'Bokkos', 'Jos East', 'Jos North', 'Jos South', 'Kanam, Kanke', 'Langtang North', 'Langtang South', 'Mangu', 'Mikang', 'Pankshin', 'Quaan Pan', 'Riyom', 'Shendam', 'Wase'
    ],
    'Sokoto State': [
        'Binji', 'Bodinga', 'Dange Shuni', 'Gada', 'Goronyo', 'Gudu', 'Gwadabawa', 'Illela', 'Isa', 'Kebbe', 'Kware', 'Rabah', 'Sabon Birni', 'Shagari', 'Silame', 'Sokoto North', 'Sokoto South', 'Tambuwal', 'Tangaza', 'Tureta, Wamako', 'Wurno', 'Yabo'
    ],
    'Taraba State': [
        'Ardo Kola', 'Bali', 'Donga', 'Gashaka', 'Gassol', 'Ibi', 'Jalingo', 'Karim Lamido', 'Kurmi', 'Lau', 'Sardauna', 'Takum', 'Ussa', 'Wukari', 'Yorro', 'Zing'
    ],
    'Yobe State': [
        'Bade', 'Bursari', 'Damaturu', 'Geidam', 'Gujba', 'Gulani', 'Fika', 'Fune', 'Jakusko', 'Karasuwa', 'Machina', 'Nangere', 'Nguru', 'Potiskum', 'Tarmuwa', 'Yunusari', 'Yusufari'
    ],
    'Zamfara State': [
       'Anka', 'Bakura', 'Birnin Magaji/Kiyaw', 'Bukkuyum', 'Bungudu', 'Tsafe', 'Gummi', 'Gusau', 'Kaura Namatoda', 'Maradun', 'Maru', 'Shinkafi', 'Talata Mafara', 'Zurmi'
    ],
    'FCT Abuja': [
       'Abaji', 'Kuje', 'Gwagwalada', 'Bwari', 'Kwali', 'Abuja Municipal'
    ]
};


function useCity(param){
    var parentE = document.getElementById('locaGv');
    // console.log(param);
    console.log(parentE);
    var emptOptn = '<option value="" id="optG">Select Local Govt</option>';
    parentE.innerHTML = emptOptn;
    for (var i = 0; i < param.length; i++) {
        var elem = '<option value="' + param[i] + '">' + param[i] + '</option>';
                    $(elem).insertBefore('#optG');
                // console.log(parentE);
    }
    console.log(document.getElementById('locaGv'));
}


function useSelectedItem(param){
    console.log(param);
    var parentE = document.getElementById('locaGv');
    console.log(parentE);
    // console.log(param.value);
    parentE.innerHTML = '';
    useCity(lGA[param.value]);
}




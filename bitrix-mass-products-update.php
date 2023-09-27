// $IBLOCK_ID = 3;
// $SECTION_ID = 77;

// $arSelect = ["ID", "NAME", "DETAIL_PAGE_URL"];
// $arFilter = ["IBLOCK_ID" => $IBLOCK_ID, "SECTION_ID" => $SECTION_ID];
// $res = CIBlockElement::GetList([], $arFilter, false, [], $arSelect);

// $arItems = [];

// while ($ob = $res->GetNextElement()) {
// 	$arFields = $ob->GetFields();
// 	$arItems[] = $arFields['ID'];
// }

// foreach ($arItems as $key => $elementId) {
// 	CIBlockElement::SetPropertyValuesEx($elementId, false, ["sort_2" => "33"]);
// }

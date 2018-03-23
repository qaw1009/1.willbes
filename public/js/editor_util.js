/**
 * HTML 문서의 모든 텍스트 리턴
 * @param $editor
 * @returns string
 */
function getEditorDocumentContent($editor)
{
    var html = $editor.outputHTML();
    $editor.returnFalse();
    return html;
}

/**
 * BODY 태그 안쪽의 모든 텍스트 리턴
 * @param $editor
 * @returns string
 */
function getEditorBodyContent($editor)
{
    var html = $editor.outputBodyHTML();
    $editor.returnFalse();
    return html;
}

/**
 * BODY 태그 안쪽의 HTML 태그를 제외한 텍스트 리턴
 * @param $editor
 * @returns string
 */
function getEditorTextContent($editor)
{
    var html = $editor.outputBodyText();
    $editor.returnFalse();
    return html;
}

/**
 * HTML 문서의 모든 문자 수 리턴
 * @param $editor
 * @returns int
 */
function getEditorDocumentLength($editor)
{
    return $editor.contentsLengthAll();
}

/**
 * BODY 태그 안쪽의 HTML 태그를 포함한 모든 문자 수 리턴
 * @param $editor
 * @returns int
 */
function getEditorBodyLength($editor)
{
    return $editor.contentsLength();
}

/**
 * 입력한 텍스트 문자 수 리턴
 * @param $editor
 * @returns int
 */
function getEditorTextLength($editor)
{
    return $editor.inputLength();
}

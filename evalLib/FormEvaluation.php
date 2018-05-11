<?php

namespace evalLib;
use evalLib\MetaRecords\FormStructer;
use evalLib\MetaRecords\RecordForm;

class FormEvaluation{

    private $_CompEval;
    private $form="";
    public $FormAttrib;
    private $_Has_Submit=false;
    public function __construct(CompEvaluation $EvalCom,FormStructer $FormData=Null)
    {
        $this->_CompEval=$EvalCom;
        if(!$FormData){
            $this->FormAttrib=new FormStructer();
        }else{
            $this->FormAttrib=$FormData;
        }

        $this->FormContruction();
    }

    /**
     * @return FormStructer
     */
    public function getFormAttrib(): FormStructer
    {
        return $this->FormAttrib;
    }

    /**
     * @param FormStructer $FormAttrib
     */
    public function setFormAttrib(FormStructer $FormAttrib)
    {
        $this->FormAttrib = $FormAttrib;
    }



    public function FormContruction($EvalCom=Null){

        if($EvalCom){
            foreach ($EvalCom as $key => $CompToEval){
                if($CompToEval->_RecordEval->getAffiche()){
                    $this->form.="<section>
                        <h3>".$CompToEval->_RecordEval->getLabel()."</h3>
                        <article>
                        <h4>".$CompToEval->_RecordEval->getDescription()."</h4>";
                }else{
                    $this->form.="<section>
                        <h3> </h3>
                        <article>
                        <h4> </h4>";
                }


                $this->FormElmentContruct($CompToEval);
                if(is_array($CompToEval->_SubComp) && count($CompToEval->_SubComp)) {
                    $this->FormContruction($CompToEval->_SubComp);
                }

                $this->form.="</article></section>";

            }
        }else{

            if($this->_CompEval->_RecordEval->getAffiche()){
                $this->form.="<section>
                        <h3>".$this->_CompEval->_RecordEval->getLabel()."</h3>
                        <article>
                        <h4>".$this->_CompEval->_RecordEval->getDescription()."</h4>";
            }else{
                $this->form.="<section>
                        <h3> </h3>
                        <article>
                        <h4> </h4>";
            }
            $this->FormElmentContruct($this->_CompEval);
            if(is_array($this->_CompEval->_SubComp) && count($this->_CompEval->_SubComp)) {
                $this->FormContruction($this->_CompEval->_SubComp);
            }
            $this->form.="</article></section>";
        }
    }
    private function FormElmentContruct(CompEvaluation $formElts){
        if(is_array($formElts->_form) && count($formElts->_form)){
            $this->form.="<fieldset>
                            <legend>".$formElts->_RecordEval->getLabel()."</legend>";
            foreach ($formElts->_form as $key => $elt){

                switch ($elt->getType()){
                    case 'select':
                        $this->form.=$this->setSelect($elt);
                        break;
                    case "text":

                        $this->form.=$this->setText($elt);
                        break;
                    case "textarea":
                        $this->form.=$this->setTextarea($elt);
                        break;
                    case "submit":
                        $this->form.=$this->setSubmit($name,$id,$label);
                        break;

                    default:
                        $this->form.=$this->setOtherInput($elt);
                    break;
                }
            }
            $this->form.="</fieldset>";
        }
    }
    public function setSelect(RecordForm $elt){
        $class=$this->DetectClass($elt->getClass());
        $other=$this->DetectOtherAttrib($elt->getOther());

        $select="<label for=\"".$elt->getName()."\">".$elt->getLabel()."</label>";
        $select .="<select name=\"".$elt->getName()."\" id=\"".$elt->getId()."\" $other $class>";
        $list=$elt->getList();
        foreach ($list as $key=>$val){
            $select.="<option value=\"$key\" >$val</option>";
        }

        $select.="</select>";
        return $select;
    }

    public function setText(RecordForm $elt){
        $class=$this->DetectClass($elt->getClass());
        $other=$this->DetectOtherAttrib($elt->getOther());

        $select="<label for=\"".$elt->getName()."\">".$elt->getLabel()."</label>";
        $select .="<input type=\"text\" name=\"".$elt->getName()."\" id=\"".$elt->getId()."\" $class $other>";
        return $select;
    }

    public function setOtherInput(RecordForm $elt){

        $class=$this->DetectClass($elt->getClass());
        $other=$this->DetectOtherAttrib($elt->getOther());
        $input="<label for=\"".$elt->getName()."\">".$elt->getLabel()."</label>";

        $input .="<input type=\"".$elt->getType()."\" name=\"".$elt->getName()."\" id=\"".$elt->getId()."\" $class $other>";
        return $input;
    }

    public function setTextarea(RecordForm $elt){
        $class=$this->DetectClass($elt->getClass());
        $other=$this->DetectOtherAttrib($elt->getOther());
        $input="<label for=\"".$elt->getName()."\">".$elt->getLabel()."</label>";

        $input .="<textarea type=\"text\" name=\"".$elt->getName()."\" id=\"".$elt->getId()."\" $other $class></textarea>";
        return $input;
    }

    public function setSubmit($name,$id,$label ){

        $this->_Has_Submit=true;
        return "<input type=\"submit\" value=\"$label\" name=\"$name\" id=\"$id\" >";
    }

    private function DetectClass($options){
        $class="";
        if(is_array($options)){
            foreach ($options as $c){
                $class.=" $c";
            }
        }else{
            $class.=" $options";
        }


        if(!empty($class)){
            $class=" class=\"$class\"";
        }
        return $class;
    }


    private function DetectOtherAttrib($options){
        $other="";

        if(is_array($options)){
            foreach ($options as $key=>$c){
                $other.="$key=\"$c\"";
            }
        }


        return $other;
    }

    public function openTag(){
        $class=$this->FormAttrib->getClass();
        $other=$this->FormAttrib->getOther();
        return $this->FormAttrib;
       // return "<form $other $class action=\"".$this->FormAttrib->getAction()."\" method=\"".$this->FormAttrib->getMethod()."\" name=\"".$this->FormAttrib->getName()."\" class=\"".$this->FormAttrib->getClass()."\">";
    }

    public function closeTag(){
        $closeForm="";
        if(!$this->_Has_Submit){
            $closeForm=$this->setSubmit("submit","submit","Enregistrer");
        }
        $closeForm.="</form>";
        return $closeForm;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        $form = $this->openTag();
        $form.=$this->form;

        $form.=$this->closeTag();


        return $form;

    }

}
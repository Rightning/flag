from keras.models import load_model
import numpy as np
from keras.preprocessing.image import img_to_array, load_img

class FlagDiscrimination():
  model=load_model('flagd/transfer40.h5')#学習器のロード
  img_path = ('./example.jpg')#判別したい画像のパス
  img = img_to_array(load_img(img_path, target_size=(224,224)))#判別したい画像を管理するNdarray

  def SetModelPath(self,path):#パスでモデルをセット
    self.model = load_model(path)

  #バイナリデータから画像をセットする関数も作りたい

  def SetImageByNdarray(self,image):#Ndarrayで画像をセット
    self.img =img

  def SetImagelByPath(self,path):#パスで画像をセット
    self.img_path  = load_img_path(path)
    self.img = img_to_array(load_img(self.img_path, target_size=(224,224)))

  #国旗の正誤をboolで返す関数も作る予定

  def Discriminate(self):#判別を行う。返り値は国名二文字
    img_nad = img_to_array(self.img)/255
    img_nad = img_nad[None, ...]
    #label=["br","fr","is","it","jo","jp","kr","mr","no","us"]
    label = ["br","ca","cd","ch","cl","cn","co","cu","de","fr","gr","hm","id","ie","in","is","it","jm","jo","jp","kp","kr","la","ma","mr","ng","nl","no","nz","pa","pl","ru","sh","th","tr","tw","ua","us","vn","za"]
    pred = self.model.predict(img_nad, batch_size=1, verbose=0)
    score = np.max(pred)
    pred_label = label[np.argmax(pred[0])]
    #print('name:',pred)
    print(pred_label)
    print(score)
    return pred_label

check = FlagDiscrimination().Discriminate()#動作確認用のコード
#print(check)#動作確認用のコード

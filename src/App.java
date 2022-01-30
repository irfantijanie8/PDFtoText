import java.io.File;
import java.io.IOException;
import java.io.FileWriter;
import java.nio.file.Path;
import java.nio.file.Paths;
import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.text.PDFTextStripper;


public class App {

    public static void main(String[] args) throws IOException {
        Path currentRelativePath = Paths.get("");
        String cwdPath = currentRelativePath.toAbsolutePath().toString();

        try{
            //Opening a document
            //Loading a document
            File file = new File(cwdPath+"/uploaded_files/upload.pdf");
            PDDocument doc = PDDocument.load(file);

            //Create PDFTextStripper object to extract text
            PDFTextStripper pdfStripper = new PDFTextStripper();

            //Retrieve text from PDF document
            String text = pdfStripper.getText(doc);

            //Create a writer object
            //Open a file to save the .txt file
            FileWriter writer = new FileWriter(new File(cwdPath+"/downloaded_files/download.txt"));

            //Write the text into the file
            writer.write(text);

            //Close the stream
            writer.close();

            //Closing the document
            doc.close();
        }
        catch (Exception e){}
    }
}  